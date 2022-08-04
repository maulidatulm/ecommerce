<?php 
    session_start();
    include "Administrator/koneksi.php";

    if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) {
        echo "<script>alert('Silahkan login');</script>";
        echo "<script>location='login.php';</script>";
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
    <title>Riwayat Pembelian</title>
</head>
<body>
<nav class="navbar fixed-top navbar-light bg-light">
    <a class="navbar-brand">Online shop</a>
    <form class="form-inline">
        <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" name="" placeholder="Search...">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-success my-2 my-sm-0 mr-4"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </span>
            </div>
        </div>
        <a href="belanja.php" class="btn btn-success my-2 my-sm-0 mr-4"><i class="fa fa-shopping-cart"
                aria-hidden="true"></i></a>
        <?php if (isset($_SESSION["pelanggan"])): ?>
            <a href="logout.php" class="btn btn-outline-success">Logout</a>
        <?php else: ?>
            <a href="login.php" class="btn btn-outline-success">Login</a>
        <?php endif ?>
    </form>
</nav><br><br><br><br><br>
<div class="container">
    <h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $nomor=1;
                $id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];

                $a = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                while($b = $a->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $b["tanggal_pembelian"]; ?></td>
                <td>
                    <?php echo $b["status_pembelian"]; ?><br>
                    <?php if (!empty($b['resi'])):?>
                        Resi: <?php echo $b["resi"]; ?>
                    <?php endif ?>
                </td>
                <td>Rp.<?php echo number_format($b["total_pembelian"]); ?></td>
                <td>
                    <a href="nota.php?id=<?php echo $b["id_pembelian"]; ?>" class="btn btn-info">Nota</a>
                    <?php if ($b['status_pembelian']=="pending"): ?>
                        <a href="pembayaran.php?id=<?php echo $b["id_pembelian"]; ?>" class="btn btn-success">Input Pembayaran</a>
                    <?php else: ?>
                        <a href="lihatpembayaran.php?id=<?php echo $b["id_pembelian"]; ?>" class="btn btn-warning">Lihat Pembayaran</a>
                    <?php endif ?>
                </td>
            </tr>
            <?php $nomor++; ?>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>