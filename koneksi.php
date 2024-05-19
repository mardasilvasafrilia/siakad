<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "siakad";

$conn = new mysqli($servername, $username, $password, $database);

//pengecekan koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal".$conn->connect_error);
}

// echo "Koneksi Berhasil";

?>