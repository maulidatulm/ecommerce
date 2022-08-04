<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Kategori</h1>
</div>
<hr>
<?php 
    $semuadata = array();
    $a = $koneksi->query("SELECT * FROM kategori");  
    while ($b = $a->fetch_assoc()) {
        $semuadata[] = $b;
    }
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($semuadata as $key => $value): ?>
        <tr>
            <td><?php echo $key+1; ?></td>
            <td><?php echo $value["nama_kategori"]; ?></td>
            <td>
                <a href="" class="btn btn-warning btn-sm">Ubah</a>
                <a href="" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<a href="index.php?halaman=tambahkategori" class="btn btn-primary">Tambah Data</a>