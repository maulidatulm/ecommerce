<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pelanggan</h1>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $a = $koneksi->query("SELECT * FROM pelanggan"); ?>
        <?php while($b = $a->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $b['nama_pelanggan']; ?></td>
            <td><?php echo $b['email_pelanggan']; ?></td>
            <td><?php echo $b['telepon_pelanggan']; ?></td>
            <td><?php echo $b['alamat']; ?></td>
            <td>
                <a href="" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>