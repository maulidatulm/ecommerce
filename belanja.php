<?php 
    session_start();

    // echo "<pre>";
    // print_r($_SESSION['belanja']);
    // echo "</pre>";

    include "Administrator/koneksi.php";

    if (empty($_SESSION["belanja"]) OR !isset($_SESSION["belanja"])) {
        echo "<script>alert('Keranjang kosong')</script>";   
        echo "<script>location='index.php';</script>";
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
    <title>Keranjang Belanja</title>
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
        <button class="btn btn-success my-2 my-sm-0 mr-4" type="submit"><i class="fa fa-shopping-cart"
                aria-hidden="true"></i></button>
        <?php if (isset($_SESSION["pelanggan"])): ?>
            <a href="logout.php" class="btn btn-outline-success">Logout</a>
        <?php else: ?>
            <a href="login.php" class="btn btn-outline-success">Login</a>
        <?php endif ?>
    </form>
</nav><br><br><br><br><br>
<section class="content">
    <div class="container">
        <h1>Keranjang Belanja</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $nomor=1; ?>
            <?php foreach ($_SESSION["belanja"] as $id_produk => $jumlah): ?>
            <?php $a = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
            $b = $a->fetch_assoc();
            $subharga = $b["harga_produk"]*$jumlah;
            // echo "<pre>";
            // print_r($b);
            // echo "</pre>";
            ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $b["nama_produk"]; ?></td>
                    <td>Rp. <?php echo number_format($b["harga_produk"]); ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td>Rp. <?php echo number_format($subharga); ?></td>
                    <td><a href="hapus.php?id=<?php echo $id_produk; ?>" class="badge badge-danger">Hapus</a></td>
                </tr>
            <?php $nomor++; ?>
            <?php endforeach ?>
            </tbody>
        </table>

        <a href="index.php" class="btn btn-info">Lanjutkan Belanja</a>
        <a href="checkout.php" class="btn btn-primary">Checkout</a>
    </div>
</section>
</body>
</html>