<?php
include 'db_connect.php';

// Mengamankan input ID dari URL
$id = intval($_GET['id']);

// Menggunakan nama kolom yang sesuai (case-sensitive)
$query = "DELETE FROM transaksi_penjualan WHERE ID_Transaksi = $id";


if (mysqli_query($conn, $query)) {
    header("Location: index.php");
    exit(); // Saya Menambahkan exit agar script berhenti setelah redirect
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>


