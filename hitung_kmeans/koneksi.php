<?php
//koneksi basisdata
$mysqli = new mysqli("localhost", "root", "", "db_kmeans");
// cek koneksi
if (mysqli_connect_errno()) {
    echo "tidak terkoneksi";
    exit;
}
