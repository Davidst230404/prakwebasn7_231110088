<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Transaksi</title>
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
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Tambah Data Transaksi</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="Nama_Pelanggan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="Tanggal" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Total Pembelian (contoh: 250000)</label>
                    <input type="number" name="Total_Pembelian" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <input type="text" name="Metode_Pembayaran" class="form-control" required>
                </div>
                <div class="mt-4">
                    <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                    <a href="index.php" class="btn btn-secondary ml-2">Kembali</a>
                </div>
            </form>

            <?php
            if (isset($_POST['simpan'])) {
                $nama_pelanggan = mysqli_real_escape_string($conn, $_POST['Nama_Pelanggan']);
                $tanggal = mysqli_real_escape_string($conn, $_POST['Tanggal']);
                $total_pembelian = (int) $_POST['Total_Pembelian'];
                $metode_pembayaran = mysqli_real_escape_string($conn, $_POST['Metode_Pembayaran']);

                $query = "INSERT INTO transaksi_penjualan 
                          (Nama_Pelanggan, Tanggal, Total_Pembelian, Metode_Pembayaran)
                          VALUES ('$nama_pelanggan', '$tanggal', $total_pembelian, '$metode_pembayaran')";

                if (mysqli_query($conn, $query)) {
                    echo "<div class='alert alert-success mt-3 fade-in'>Data berhasil ditambahkan! <a href='index.php' class='alert-link'>Lihat Data</a></div>";
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
