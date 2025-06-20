<?php
include 'db_connect.php';

// Menangkap dan Mengamankan ID
$id = intval($_GET['id']);

// Mengambil data berdasarkan ID_Transaksi
$data = mysqli_query($conn, "SELECT * FROM transaksi_penjualan WHERE ID_Transaksi = $id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1c1c1e;
            color: #f1f1f1;
            font-family: 'Segoe UI', sans-serif;
        }

        .card-dark {
            background-color: #2c2c2e;
            border: none;
            border-radius: 12px;
        }

        .form-control {
            background-color: #3a3a3c;
            color: #fff;
            border: 1px solid #444;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .form-group label {
            color: #ccc;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="container mt-5 fade-in">
    <div class="card card-dark shadow">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Edit Data Transaksi</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="Nama_Pelanggan" value="<?php echo $row['Nama_Pelanggan']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="Tanggal" value="<?php echo $row['Tanggal']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Total Pembelian</label>
                    <input type="number" name="Total_Pembelian" value="<?php echo $row['Total_Pembelian']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <input type="text" name="Metode_Pembayaran" value="<?php echo $row['Metode_Pembayaran']; ?>" class="form-control" required>
                </div>
                <div class="mt-4">
                    <button type="submit" name="update" class="btn btn-success">Simpan Perubahan</button>
                    <a href="index.php" class="btn btn-secondary ml-2">Kembali</a>
                </div>
            </form>

            <?php
            if (isset($_POST['update'])) {
                $nama_pelanggan = mysqli_real_escape_string($conn, $_POST['Nama_Pelanggan']);
                $tanggal = mysqli_real_escape_string($conn, $_POST['Tanggal']);
                $total_pembelian = (int) $_POST['Total_Pembelian'];
                $metode_pembayaran = mysqli_real_escape_string($conn, $_POST['Metode_Pembayaran']);

                $query = "UPDATE transaksi_penjualan 
                          SET Nama_Pelanggan = '$nama_pelanggan', 
                              Tanggal = '$tanggal', 
                              Total_Pembelian = $total_pembelian, 
                              Metode_Pembayaran = '$metode_pembayaran' 
                          WHERE ID_Transaksi = $id";

                if (mysqli_query($conn, $query)) {
                    echo "<div class='alert alert-success mt-3 fade-in'>Data berhasil diupdate! <a href='index.php' class='alert-link'>Lihat Data</a></div>";
                } else {
                    echo "<div class='alert alert-danger mt-3 fade-in'>Error: " . mysqli_error($conn) . "</div>";
                }
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>
