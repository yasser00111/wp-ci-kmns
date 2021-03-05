<?php

include "koneksi.php";
// fungsi mencari query single data
function caridata($mysqli, $query)
{
    $row = $mysqli->query($query);
    if ($err = mysqli_error($mysqli)) {
        // var_dump($err, $query);
        // exit(1);
    }
    $row = $row->fetch_array();
    return $row[0];
}
// inisialisasi cluster awal

$jumlahtpa = caridata($mysqli, "select count(*) from tb_tpa");
for ($i = 0; $i < $jumlahtpa; $i++) {
    $clusterawal[$i] = "1";
}
//set default nilai centroid 1,2,3,4
$centro1[0] = array('3000000', '300000', '5000', '100000');
$centro2[0] = array('2500000', '300000', '10000', '100000');
$centro3[0] = array('4500000', '400000', '20000', '200000');
$centro4[0] = array('5000000', '500000', '25000', '200000');

$status = 'false';
$loop = '0';
$x = 0;
while ($status == 'false') {
    // echo "<pre>";
    // print_r($centro1[$loop]);
    // print_r($centro2[$loop]);
    // print_r($centro3[$loop]);
    // print_r($centro4[$loop]);
    // echo "</pre>";
    // echo "<hr>";
    // //proses K-means perhitungan

    $query = "select * from tb_tpa";
    $result = $mysqli->query($query);
    while ($data = mysqli_fetch_assoc($result)) {
        extract($data);
        $hasilc1 = 0;
        $hasilc2 = 0;
        $hasilc3 = 0;
        $hasilc4 = 0;

        //proses pencarian nilai centro 1
        $hasilc1 = sqrt(pow($biaya_daftar - $centro1[$loop][0], 2) +
            pow($spp - $centro1[$loop][1], 2) +
            pow($biaya_perjam - $centro1[$loop][2], 2) +
            pow($formulir - $centro1[$loop][3], 2));

        //proses pencarian nilai centro 2
        $hasilc2 = sqrt(pow($biaya_daftar - $centro2[$loop][0], 2) +
            pow($spp - $centro2[$loop][1], 2) +
            pow($biaya_perjam - $centro2[$loop][2], 2) +
            pow($formulir - $centro2[$loop][3], 2));

        //proses pencarian nilai centro 3
        $hasilc3 = sqrt(pow($biaya_daftar - $centro3[$loop][0], 2) +
            pow($spp - $centro3[$loop][1], 2) +
            pow($biaya_perjam - $centro3[$loop][2], 2) +
            pow($formulir - $centro3[$loop][3], 2));

        //proses pencarian nilai centro 4
        $hasilc4 = sqrt(pow($biaya_daftar - $centro4[$loop][0], 2) +
            pow($spp - $centro4[$loop][1], 2) +
            pow($biaya_perjam - $centro4[$loop][2], 2) +
            pow($formulir - $centro4[$loop][3], 2));


        // mencari nilai terkecil
        if ($hasilc1 < $hasilc2 && $hasilc1 < $hasilc3 && $hasilc1 < $hasilc4) {
            $clusterakhir[$x] = 'C1';
            Update_tpa($mysqli, $ID, 'C1');
            // echo number_format($hasilc1);
        } else if ($hasilc2 < $hasilc1 && $hasilc2 < $hasilc3 && $hasilc2 < $hasilc4) {
            $clusterakhir[$x] = 'C2';
            Update_tpa($mysqli, $ID, 'C2');
            // echo number_format($hasilc2);
        } else if ($hasilc3 < $hasilc1 && $hasilc3 < $hasilc2 && $hasilc3 < $hasilc4) {
            $clusterakhir[$x] = 'C3';
            Update_tpa($mysqli, $ID, 'C3');
        } else {
            $clusterakhir[$x] = 'C4';
            Update_tpa($mysqli, $ID, 'C4');
        }
        //penambahan counter index
        $x += 1;
    }
    $loop += 1;
    // proses mencari centroid baru ambil dari database
    //centroid baru pusat 1
    $centro1[$loop][0] = caridata($mysqli, "select avg(biaya_daftar) from tb_tpa where set_sementara='C1'");
    $centro1[$loop][1] = caridata($mysqli, "select avg(spp) from tb_tpa where set_sementara='C1'");
    $centro1[$loop][2] = caridata($mysqli, "select avg(biaya_perjam) from tb_tpa where set_sementara='C1'");
    $centro1[$loop][3] = caridata($mysqli, "select avg(formulir) from tb_tpa where set_sementara='C1'");
    //centroid baru pusat 2
    $centro2[$loop][0] = caridata($mysqli, "select avg(biaya_daftar) from tb_tpa where set_sementara='C2'");
    $centro2[$loop][1] = caridata($mysqli, "select avg(spp) from tb_tpa where set_sementara='C2'");
    $centro2[$loop][2] = caridata($mysqli, "select avg(biaya_perjam) from tb_tpa where set_sementara='C2'");
    $centro2[$loop][3] = caridata($mysqli, "select avg(formulir) from tb_tpa where set_sementara='C2'");
    //centroid baru pusat 3
    $centro3[$loop][0] = caridata($mysqli, "select avg(biaya_daftar) from tb_tpa where set_sementara='C3'");
    $centro3[$loop][1] = caridata($mysqli, "select avg(spp) from tb_tpa where set_sementara='C3'");
    $centro3[$loop][2] = caridata($mysqli, "select avg(biaya_perjam) from tb_tpa where set_sementara='C3'");
    $centro3[$loop][3] = caridata($mysqli, "select avg(formulir) from tb_tpa where set_sementara='C3'");
    //centroid baru pusat 4
    $centro4[$loop][0] = caridata($mysqli, "select avg(biaya_daftar) from tb_tpa where set_sementara='C4'");
    $centro4[$loop][1] = caridata($mysqli, "select avg(spp) from tb_tpa where set_sementara='C4'");
    $centro4[$loop][2] = caridata($mysqli, "select avg(biaya_perjam) from tb_tpa where set_sementara='C4'");
    $centro4[$loop][3] = caridata($mysqli, "select avg(formulir) from tb_tpa where set_sementara='C4'");

    $status = 'true';

    for ($i = 0; $i < $jumlahtpa; $i++) {
        if ($clusterawal[$i] != $clusterakhir[$i]) {
            $status = 'false';
        }
    }
    if ($status == 'false') {
        $clusterawal = $clusterakhir;
    }
}
echo "proses berhasil di lakukan sebanyak $loop kali  ";

function Update_tpa($mysqli, $ID, $nilai)
{
    $stmt = $mysqli->prepare("update tb_tpa set
    set_sementara=?
    where ID=?");
    $stmt->bind_param(
        "ss",
        $nilai,
        $ID

    );
    $stmt->execute();
    if ($err = mysqli_error($mysqli)) {
        var_dump($err);
        exit(1);
    }
}
