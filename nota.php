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
    <link rel="stylesheet" href="Administrator/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Administrator/vendor/fontawesome-free/css/all.css">
    <title>Document</title>
</head>
<body>
<section class="content">
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Pembelian</h1>
        </div>
        <?php 
            $a = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
            $d = $a->fetch_assoc();

            $pelanggan_beli = $d["id_pelanggan"];
            $pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];
            if ($pelanggan_beli!==$pelanggan_login) {
                echo "<script>alert('Melihat nota harus menggunakan akun sendiri');</script>";
                echo "<script>location='riwayat.php';</script>";
                exit();
            }
        ?>
        <div class="row">
            <div class="col-md-4">
            <h3>Pembelian</h3>
                No pembelian: <?php echo $d['id_pembelian']; ?><br>
                Tanggal: <?php echo $d['tanggal_pembelian']; ?><br>
                Total: Rp.<?php echo $d['total_pembelian']; ?>
            </div>
            <div class="col-md-4">
            <h3>Pelanggan</h3>
                <strong><?php echo $d['nama_pelanggan']; ?></strong> <br>
                <?php echo $d['telepon_pelanggan']; ?><br>
                <?php echo $d['email_pelanggan']; ?>
            </div>
            <div class="col-md-4">
            <h3>Pengiriman</h3>
                <strong><?php echo $d['nama_kota']; ?></strong> <br>
                Ongkir: Rp.<?php echo $d['ongkos']; ?> <br>
                Alamat: <?php echo $d['alamat_lengkap']; ?> <br>
                Kode Pos: <?php echo $d['kode_pos']; ?>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga Produk</th>
                    <th>Berat Produk</th>
                    <th>Jumlah Produk</th>
                    <th>Subberat</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                <?php $a=$koneksi->query("SELECT * FROM detail_pembelian WHERE id_pembelian='$_GET[id]'"); ?>
                <?php while($b = $a->fetch_assoc()){ ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $b['produk_nama']; ?></td>
                    <td>Rp.<?php echo number_format($b['produk_harga']); ?></td>
                    <td><?php echo $b['produk_berat']; ?>Gr.</td>
                    <td><?php echo $b['jumlah'] ?></td>
                    <td><?php echo $b['produk_subberat']; ?>Gr.</td>
                    <td>Rp.<?php echo number_format($b['produk_subharga']); ?></td>
                </tr>
                <?php $nomor++; ?>
                <?php } ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning">
                    <p>
                        Silahkan melakukan pembayaran Rp.<?php echo number_format($d['total_pembelian']); ?> <br>
                        <strong>ke BANK BRI 124-009380-2548 AN. Iit Riyatul Hasanah</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

</html>