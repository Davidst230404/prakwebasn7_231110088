<?php
include 'db_connect.php';

// Amankan input ID dari URL
$id = intval($_GET['id']);

// Gunakan nama kolom yang sesuai (case-sensitive)
$query = "DELETE FROM transaksi_penjualan WHERE ID_Transaksi = $id";

// Jalankan query dan arahkan kembali ke index.php
if (mysqli_query($conn, $query)) {
    header("Location: index.php");
    exit(); // Tambahkan exit agar script berhenti setelah redirect
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>


