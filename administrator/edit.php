<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Produk</h1>
</div>
<?php  
$a = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $a->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
?>

<?php 
    $datakategori = array();

    $a = $koneksi->query("SELECT * FROM kategori");
    while ($b = $a->fetch_assoc()) {
        $datakategori[] = $b;
    }
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
        <label for="">Kategori</label><br>
        <select name="id_kategori" class="form-control" id="">
            <option value="">Pilih Kategori</option>
            <?php foreach ($datakategori as $key => $value): ?>
            <option value="<?php echo $value["id_kategori"]; ?>" <?php if($pecah["id_kategori"]==$value["id_kategori"]){ echo "selected"; } ?>>
			
			<?php echo $value["nama_kategori"]; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>" required="">
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_produk']; ?>" required="">
	</div>
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" class="form-control" name="berat" value="<?php echo $pecah['berat_produk']; ?>" required="">
	</div>
	<div class="form-group">
		<img style="width: 200px" src="../foto_produk/<?php echo $pecah['foto_produk'] ?>">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="form-group">
		<label>Stok Produk</label>
		<input type="number" class="form-control" name="stok" value="<?php echo $pecah['stok_produk']; ?>" required="">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="10"><?php echo $pecah['deskripsi_produk']; ?>
	</textarea>
	</div>
	<button class="btn btn-primary" name="edit">Edit</button>
</form>
<?php  
if (isset($_POST['edit'])) 
	{
	$nama = $_POST['nama'];
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto =$_FILES['foto']['tmp_name'];
	$folder = '../foto_produk/';
	if ($namafoto != ''){
		move_uploaded_file($lokasifoto, $folder.$namafoto);

		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok]',id_kategori='$_POST[id_kategori]' WHERE id_produk='$_GET[id]'");
	}
	else{
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok]',id_kategori='$_POST[id_kategori]' WHERE id_produk='$_GET[id]'");
	}
	echo "<script>alert('data produk telah diubah');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
}

?>