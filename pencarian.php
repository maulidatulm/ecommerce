<?php 
    include 'Administrator/koneksi.php';
?>
<?php
    $keyword = $_GET["keyword"];

    $semuadata=array();
    $a = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%'");
    while($b = $a->fetch_assoc()){
        $semuadata[]=$b;
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
    <title>Pencarian</title>
</head>
<body>
<a href="index.php" style="float: left; font-size: 30px; margin-left: 20px; color: grey;"><i
        class="fas fa-fw fa-arrow-left fa-1x" aria-hidden="true"></i></a>
    <div class="container">
        <h3 class="mt-5 mb-4">Hasil Pencarian</h3>
        <?php if (empty($semuadata)): ?>
            <div class="alert alert-danger mt-3">Produk tidak ditemukan</div>
        <?php endif ?>
        <div class="row">
        <?php foreach ($semuadata as $key => $value): ?>
            <div class="col-md-3">
                <div class="card" style="width: 250px; height: 100%">
                    <div class="shadow">
                        <img style="width: 100%; height: 190px;" class="card-img-top" src="foto_produk/<?php echo $value['foto_produk'] ?>" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 15px;"><?php echo $value['nama_produk']; ?></h5>
                        <p class="card-text" style="color: black; font-size: 12px;">Rp. <?php echo number_format($value['harga_produk']); ?></p>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                            <a href="detail.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-info btn-sm">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</body>
</html>