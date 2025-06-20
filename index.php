<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Transaksi Penjualan</title>
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

        .table-dark th {
            background-color: #3a3a3c;
            color: #ffffff;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .table-hover tbody tr:hover {
            background-color: #343a40;
            transition: background-color 0.3s ease;
        }

        .fade-in {
            animation: fadeIn 0.8s ease-in;
        }

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        a, .btn {
            transition: all 0.3s ease;
        }

        a:hover, .btn:hover {
            transform: scale(1.05);
        }

        .total-row {
            background-color: #3a3a3c;
            color: #ffffff;
        }
    </style>
</head>
<body>

<div class="container mt-5 fade-in">
    <div class="card card-dark shadow p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="font-weight-bold text-white">Data Transaksi Penjualan</h3>
            <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
        </div>

        <table class="table table-dark table-hover table-bordered rounded">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>Tanggal</th>
                    <th>Nama Pelanggan</th>
                    <th>Total Pembelian</th>
                    <th>Metode Pembayaran</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM transaksi_penjualan");
                $no = 1;
                $totalSemua = 0;

                while ($row = mysqli_fetch_assoc($result)) {
                    $total = (int)$row['Total_Pembelian'];
                    $totalSemua += $total;

                    echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['ID_Transaksi']}</td>
                        <td>{$row['Tanggal']}</td>
                        <td>{$row['Nama_Pelanggan']}</td>
                        <td>Rp " . number_format($total, 0, ',', '.') . "</td>
                        <td>{$row['Metode_Pembayaran']}</td>
                        <td class='text-center'>
                            <a href='edit.php?id={$row['ID_Transaksi']}' class='btn btn-sm btn-info'>Edit</a>
                            <a href='hapus.php?id={$row['ID_Transaksi']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin ingin hapus data ini?');\">Hapus</a>
                        </td>
                    </tr>";
                    $no++;
                }
                ?>
                <tr class="total-row font-weight-bold">
                    <td colspan="4" class="text-right">Total</td>
                    <td colspan="3">Rp <?php echo number_format($totalSemua, 0, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
