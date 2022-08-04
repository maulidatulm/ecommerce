<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pembayaran</h1>
</div>
<hr>
<?php 
    $id_pembelian = $_GET['id'];

    $a = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
    $b = $a->fetch_assoc();
?>
<div class="row">
    <div class="col-md-6">
        <img src="../foto_buktipembayaran/<?php echo $b['bukti_pembayaran']; ?>" alt="" style="width: 100%">
    </div>
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
</div><br>
<form action="" method="post">
    <div class="form-group">
        <label for="">No Resi Pengiriman</label>
        <input type="text" class="form-control" name="resi">
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <select name="status" class="form-control">
            <option value="">Pilih Status</option>
            <option value="lunas">Lunas</option>
            <option value="barang dikirim">Barang Dikirim</option>
            <option value="batal">Batal</option>
        </select>
    </div>
    <button class="btn btn-primary" name="proses">Proses</button>
</form><br>
<?php 
    if (isset($_POST["proses"])) {
        $resi = $_POST["resi"];
        $status = $_POST["status"];
        $koneksi->query("UPDATE pembelian SET resi='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");

        echo "<script>alert('Data Terupdate');</script>";
        echo "<script>location='index.php?halaman=pembelian';</script>";
    }
?>