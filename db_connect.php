<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "db_asn7";

$conn = mysqli_connect($host, $user, $password, $dbname);


if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
