<?php 
    $semuadata=array();
    $tgl_ml = "-";
    $tgl_sl = "-";
    if (isset($_POST["lihat"])) {
        $tgl_ml = $_POST["tanggalmulai"];
        $tgl_sl = $_POST["tanggalselesai"];
        $a = $koneksi->query("SELECT * FROM pembelian LEFT JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan 
        WHERE tanggal_pembelian BETWEEN '$tgl_ml' AND '$tgl_sl'");
        while($b=$a->fetch_assoc()){
            $semuadata[] = $b;
        };

    }
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan Pembelian dari <?php echo $tgl_ml; ?> hingga <?php echo $tgl_sl; ?></h1>
</div>
<hr>
<form action="" method="post" class="mb-4">
    <div class="row">
        <div class="col-md-5">
            <label for="">Tanggal Mulai</label>
            <input type="date" class="form-control" name="tanggalmulai" value="<?php echo $tgl_ml; ?>">
        </div>
        <div class="col-md-5">
            <label for="">Tanggal Selesai</label>
            <input type="date" class="form-control" name="tanggalselesai" value="<?php echo $tgl_sl; ?>">
        </div>
        <div class="col-md-2">
            <label for="">&nbsp;</label><br>
            <button class="btn btn-primary" name="lihat">Lihat</button>
        </div>
    </div>
</form>
<table class="table table-bordered">
    <thead>
        <tr>
            <td>Nama</td>
            <td>Pelanggan</td>
            <td>Tanggal</td>
            <td>Jumlah</td>
            <td>Status</td>
        </tr>
    </thead>
    <tbody>
        <?php $total=0; ?>
        <?php foreach ($semuadata as $key => $value): ?>
        <?php $total+=$value['total_pembelian']; ?>
        <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $value["nama_pelanggan"]; ?></td>
            <td><?php echo $value["tanggal_pembelian"]; ?></td>
            <td>Rp.<?php echo number_format($value["total_pembelian"]); ?></td>
            <td><?php echo $value["status_pembelian"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3" style="text-align: center">Total</th>
            <th colspan="2">Rp.<?php echo number_format($total) ?></th>
        </tr>
    </tfoot>
</table>