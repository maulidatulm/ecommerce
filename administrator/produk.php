<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Produk</h1>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="font-size: 20px">No</th>
            <th style="font-size: 20px">Kategori</th>
            <th style="font-size: 20px">Nama</th>
            <th style="font-size: 20px">Harga</th>
            <th style="font-size: 20px">Berat</th>
            <th style="font-size: 20px">Foto</th>
            <th style="font-size: 20px">Stok</th>
            <th style="font-size: 20px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $a = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori"); ?>
        <?php while($b = $a->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $b['nama_kategori']; ?></td>
            <td><?php echo $b['nama_produk']; ?></td>
            <td><?php echo $b['harga_produk']; ?></td>
            <td><?php echo $b['berat_produk']; ?></td>
            <td><img src="../foto_produk/<?php echo $b['foto_produk'] ?>" width="100"></td>
            <td><?php echo $b['stok_produk']; ?></td>
            <td>
                <a href="index.php?halaman=hapus&id=<?php echo $b['id_produk']; ?>" class="btn btn-danger">Hapus</a>
                <a href="index.php?halaman=edit&id=<?php echo $b['id_produk']; ?>" class="btn btn-warning">Edit</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
<a href="index.php?halaman=tambah" class="btn btn-info">Tambah Produk</a>