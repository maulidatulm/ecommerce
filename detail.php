<?php 
    session_start();
    include 'Administrator/koneksi.php';

    $id_produk = $_GET["id"];
    $a = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
    $b = $a->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Administrator/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Administrator/vendor/fontawesome-free/css/all.css">
    <title>Document</title>
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
<a href="index.php" style="float: left; font-size: 30px; margin-left: 20px; color: grey;"><i
        class="fas fa-fw fa-arrow-left fa-1x" aria-hidden="true"></i></a>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="foto_produk/<?php echo $b["foto_produk"]; ?>" alt="" class="img-resposive" style="width: 100%">
        </div>
        <div class="col-md-6">
            <h2><?php echo $b["nama_produk"]; ?></h2>
            <h4>Rp.<?php echo $b["harga_produk"]; ?></h4>
            <h5>Stok: <?php echo $b["stok_produk"] ?></h5>
            <p style="color:black;"><?php echo $b["deskripsi_produk"]; ?></p>
            <form action="" method="post">
                <div class="form-group">
                    <div class="input-group">
                        <input type="number" class="form-control" name="jumlah" min="1" max="<?php echo $b["stok_produk"]; ?>">
                        <div class="input-group-btn">
                            <button class="btn btn-success" name="beli">Beli</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php 
                if (isset($_POST["beli"])) {
                    $jumlah = $_POST["jumlah"];
                    $_SESSION["belanja"][$id_produk] = $jumlah;

                    echo "<script>location='belanja.php';</script>";
                }
            ?>
        </div>
    </div>
</div>
</body>
</html>