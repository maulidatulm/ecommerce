<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Pembelian</h1>
</div>
<?php 
    $a = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
    $d = $a->fetch_assoc();
?>
<div class="row">
    <div class="col-md-4">
    <h3>Pembelian</h3><br><br>
        Tanggal: <?php echo $d['tanggal_pembelian']; ?><br>
        Total: Rp.<?php echo number_format($d['total_pembelian']); ?> <br>
        Status: <?php echo $d['status_pembelian']; ?>
    </div>
    <div class="col-md-4">
    <h3>Pelanggan</h3>
        <strong><?php echo $d['nama_pelanggan']; ?></strong> <br><br>
        <?php echo $d['telepon_pelanggan']; ?><br>
        <?php echo $d['email_pelanggan']; ?>
    </div>
    <div class="col-md-4">
    <h3>Pengiriman</h3>
        <strong><?php echo $d['nama_kota']; ?></strong> <br><br>
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
            <th>Jumlah Produk</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $a=$koneksi->query("SELECT * FROM detail_pembelian JOIN produk ON detail_pembelian.id_produk=produk.id_produk WHERE detail_pembelian.id_pembelian='$_GET[id]'"); ?>
        <?php while($b=$a->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $b['nama_produk']; ?></td>
            <td>Rp.<?php echo number_format($b['harga_produk']); ?></td>
            <td><?php echo $b['jumlah'] ?></td>
            <td>Rp.<?php echo number_format($b['harga_produk']*$b['jumlah']); ?></td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>