<?php 
    session_start();
    include "Administrator/koneksi.php";

    if (!isset($_SESSION["pelanggan"])) {
        echo "<script>alert('Silahkan login terlebih dahulu')</script>"; 
        echo "<script>location='login.php'</script>"; 
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
                </tr>
            </thead>
            <tbody>
            <?php $nomor=1; ?>
            <?php $total=0; ?>
            <?php foreach ($_SESSION["belanja"] as $id_produk => $jumlah): ?>
            <?php $b = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
            $c = $b->fetch_assoc();
            $subharga = $c["harga_produk"]*$jumlah;
            // echo "<pre>";
            // print_r($b);
            // echo "</pre>";
            ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $c["nama_produk"]; ?></td>
                    <td>Rp. <?php echo number_format($c["harga_produk"]); ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td>Rp. <?php echo number_format($subharga); ?></td>
                </tr>
            <?php $nomor++; ?>
            <?php $total+=$subharga; ?>
            <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" style="text-align: center;">Total</th>
                    <th>Rp. <?php echo number_format($total); ?></th>
                </tr>
            </tfoot>
        </table>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" readonly value="<?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" readonly value="<?php echo $_SESSION["pelanggan"]["telepon_pelanggan"] ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select name="id_ongkir" class="form-control" id="">
                            <option value="">Pilih Ongkir</option>
                            <?php 
                                $a = $koneksi->query("SELECT * FROM ongkir");
                                while($b = $a->fetch_assoc()){
                            ?>
                            <option value="<?php echo $b["id_ongkir"] ?>">
                                <?php echo $b['nama_kota']; ?> -
                                Rp.<?php echo $b['ongkos']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">Alamat Lengkap</label>
                        <textarea name="alamat_lengkap" class="form-control" id="" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Kode Pos</label>
                        <input type="text" name="kode_pos" class="form-control">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" name="checkout">Checkout</button>
        </form>
        <?php 
            if (isset($_POST["checkout"])) {
                $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                $id_ongkir = $_POST["id_ongkir"];
                $alamat_lengkap = $_POST['alamat_lengkap'];
                $kode_pos = $_POST['kode_pos'];
                $tanggal_pembelian = date("Y-m-d");

                $a = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
                $b = $a->fetch_assoc();
                $nama_kota = $b['nama_kota'];
                $ongkos = $b['ongkos'];
                $total_pembelian = $total + $ongkos;

                $koneksi->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,ongkos,alamat_lengkap,kode_pos) 
                VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$ongkos','$alamat_lengkap','$kode_pos')");

                $p = $koneksi->insert_id;
                foreach ($_SESSION["belanja"] as $id_produk => $jumlah) {
                    $a = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                    $b = $a->fetch_assoc();
                    $produk_nama = $b['nama_produk'];
                    $produk_harga = $b['harga_produk'];
                    $produk_berat = $b['berat_produk'];
                    $produk_subberat = $b['berat_produk']*$jumlah;
                    $produk_subharga = $b['harga_produk']*$jumlah;
                    $koneksi->query("INSERT INTO detail_pembelian (id_pembelian,id_produk,produk_nama,produk_harga,produk_berat,produk_subberat,produk_subharga,jumlah) 
                    VALUES ('$p','$id_produk','$produk_nama','$produk_harga','$produk_berat','$produk_subberat','$produk_subharga','$jumlah')");

                    $koneksi->query("UPDATE produk SET stok_produk=stok_produk - $jumlah WHERE id_produk='$id_produk'");
                }

                unset($_SESSION["belanja"]);

                echo "<script>alert('Pembelian sukses');</script>";
                echo "<script>location='nota.php?id=$p';</script>";
            }
        ?>
    </div>
</section>
</body>
</html>