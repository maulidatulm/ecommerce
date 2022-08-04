<?php 
    session_start();
    include "Administrator/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Administrator/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Administrator/vendor/fontawesome-free/css/all.css">
    <title>Online Shop</title>
</head>
<body>
<nav class="navbar fixed-top navbar-light bg-light mb-5">
    <a class="navbar-brand">Online shop</a>
    <form class="form-inline" action="pencarian.php" method="get">
        <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" name="keyword" placeholder="Search...">
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
<section class="content">
<div class="container">
<h1>Produk Terbaru</h1>
        <div class="row mb-4 pt-4 pb-4">
        <?php $a = $koneksi->query("SELECT * FROM produk"); ?>
        <?php while($produk = $a->fetch_assoc()){ ?>
            <div class="col-md-3">
                <div class="card" style="width: 250px; height: 100%">
                    <div class="shadow">
                        <img style="width: 100%; height: 190px;" class="card-img-top" src="foto_produk/<?php echo $produk['foto_produk'] ?>" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 15px;"><?php echo $produk['nama_produk']; ?></h5>
                        <p class="card-text" style="color: black; font-size: 12px;">Rp. <?php echo number_format($produk['harga_produk']); ?></p>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <a href="detail.php?id=<?php echo $produk['id_produk']; ?>" class="btn btn-info btn-sm">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</section>
</body>

</html>