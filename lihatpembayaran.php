<?php 
    session_start();
    include "Administrator/koneksi.php";

    $id_pembelian = $_GET['id'];
    $a = $koneksi->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_pembelian='$id_pembelian'");
    $b = $a->fetch_assoc();

    if (empty($b)) {
        echo "<script>alert('belum ada data pembayaran');</script>";
        echo "<script>location='riwayat.php';</script>";
    }

    if ($_SESSION["pelanggan"]['id_pelanggan']!==$b["id_pelanggan"]) {
        echo "<script>alert('Anda tudak berhak melihat pembayaran ini');</script>";
        echo "<script>location='riwayat.php';</script>";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Administrator/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Administrator/vendor/fontawesome-free/css/all.css">
    <title>Lihat Pembayaran</title>
</head>
<body>
<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
    <h1 class="h3 mb-0 text-gray-800">Data Pembayaran</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <th><?php echo $b['nama_pembayar']; ?></th>
            </tr>
            <tr>
                <th>Bank</th>
                <th><?php echo $b['bank']; ?></th>
            </tr>
            <tr>
                <th>Jumlah</th>
                <th>Rp.<?php echo number_format($b['jumlah']); ?></th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th><?php echo $b['tanggal']; ?></th>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <img src="foto_buktipembayaran/<?php echo $b['bukti_pembayaran']; ?>" alt="" style="width: 90%;">
    </div>
</div>
</body>
</html>