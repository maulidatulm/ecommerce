<?php 
    session_start();
    include "Administrator/koneksi.php";

    if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
        echo "<script>alert('Silahkan login');</script>";
        echo "<script>location='login.php';</script>";
        exit();
    }

    $id_pembelian = $_GET["id"];
    $a = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$id_pembelian'");
    $b = $a->fetch_assoc();

    $pelanggan_beli = $b["id_pelanggan"];
    $pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];
    if ($pelanggan_login!==$pelanggan_beli) {
        echo "<script>alert('Melihat nota harus menggunakan akun sendiri');</script>";
        echo "<script>location='riwayat.php';</script>";
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
    <title>Pembayaran</title>
</head>
<body>
    <div class="container">
        <h2>Konformasi Pembayaran</h2>
        <p>Kirim Bukti Pembayaran Disini</p>
        <div class="alert alert-info">total info tagihan Anda <strong>Rp. <?php echo number_format($b["total_pembelian"]); ?></strong></div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama Penyetor</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label for="">Bank</label>
                <input type="text" class="form-control" name="bank">
            </div>
            <div class="form-group">
                <label for="">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" min="1">
            </div>
            <div class="form-group">
                <label for="">Foto Bukti</label>
                <input type="file" class="form-control" name="bukti">
                <p class="text-danger">foto bukti harus JPG maksimal 2MB</p>
            </div>
            <button class="btn btn-primary" name="kirim">Kirim</button>
        </form>
    </div>
    <?php 
        if (isset($_POST["kirim"])) {
            $namabukti = $_FILES["bukti"]["name"];
            $lokasibukti = $_FILES["bukti"]["tmp_name"];
            $namapembayaran = date("YmdHis").$namabukti;
            move_uploaded_file($lokasibukti, "foto_buktipembayaran/$namapembayaran");

            $nama = $_POST["nama"];
            $bank = $_POST["bank"];
            $jumlah = $_POST["jumlah"];
            $tanggal = date("Y-m-d");

            $koneksi->query("INSERT INTO pembayaran (id_pembelian,nama_pembayar,bank,jumlah,tanggal,bukti_pembayaran) 
            VALUES ('$id_pembelian','$nama','$bank','$jumlah','$tanggal','$namapembayaran')");

            $koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian='$id_pembelian'");
            echo "<script>alert('Terimakasih sudah mengirimkan bukti pembayaran');</script>";
            echo "<script>location='riwayat.php';</script>";
        }
    ?>
</body>
</html>