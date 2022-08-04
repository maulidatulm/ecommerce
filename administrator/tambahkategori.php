<?php 
    include 'koneksi.php';
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Kategori Produk</h1>
</div>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Nama Kategori</label><br>
        <input type="text" name="namakategori" id="" class="form-control" required="">
    </div>
    <button class="btn btn-primary" name="tambah">Tambah</button>
</form>
<?php 
if (isset($_POST['tambah'])) 
{
	$koneksi->query("INSERT INTO kategori (nama_kategori) VALUES('$_POST[namakategori]')");

		echo "<script>alert('Kategori telah ditambahkan');</script>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";
}
?>