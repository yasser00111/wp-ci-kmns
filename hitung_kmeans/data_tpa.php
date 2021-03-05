<?php
include "koneksi.php"
<h3>Data TPA</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>No</th>
        <th>Nama TPA</th>
        <th>Biaya daftar</th>
        <th>Biaya perbulan</th>
        <th>Biaya perjam</th>
        <th>Formulir</th>
    </tr>
    <?php
    include "hitung_kmeans.php";
    $no = 1;
    $ambildata = mysqli_query($hitung_kmeans,"select * from db_tps");
    while ($tampil = mysqli_fetch_array($ambildata)){
        echo "
        ";
    }
<tr>
<td></td>
</tr>
    ?>
</table>