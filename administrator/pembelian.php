<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pembelian</h1>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Status Pembelian</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $a = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan"); ?>
        <?php while($b = $a->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $b['nama_pelanggan']; ?></td>
            <td><?php echo $b['tanggal_pembelian']; ?></td>
            <td><?php echo $b['status_pembelian'] ?></td>
            <td><?php echo $b['total_pembelian'] ?></td>
            <td>
                <a href="index.php?halaman=detail&id=<?php echo $b['id_pembelian'] ?>" class="btn btn-primary">Detail</a>
                <?php if ($b['status_pembelian']!=="pending"): ?>
                    <a href="index.php?halaman=pembayaran&id=<?php echo $b['id_pembelian'] ?>" class="btn btn-warning">Pembayaran</a>
                <?php endif ?>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>