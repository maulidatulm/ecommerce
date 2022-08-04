<?php 
    $datakategori = array();

    $a = $koneksi->query("SELECT * FROM kategori");
    while ($b = $a->fetch_assoc()) {
        $datakategori[] = $b;
    }
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Produk</h1>
</div>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Kategori</label><br>
        <select name="id_kategori" class="form-control" id="">
            <option value="">Pilih Kategori</option>
            <?php foreach ($datakategori as $key => $value): ?>
            <option value="<?php echo $value["id_kategori"]; ?>"><?php echo $value["nama_kategori"]; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Nama</label><br>
        <input type="text" name="nama" id="" class="form-control" required="">
    </div>
    <div class="form-group">
        <label for="">Harga (Rp)</label><br>
        <input type="number" name="harga" id="" class="form-control" required="">
    </div>
    <div class="form-group">
        <label for="">Berat (Gr)</label><br>
        <input type="number" name="berat" id="" class="form-control" required="">
    </div>
    <div class="form-group">
        <label for="">Foto Produk</label><br>
        <input type="file" name="foto" id="" class="form-control" required="">
    </div>
    <div class="form-group">
        <label for="">Stok Produk</label><br>
        <input type="number" name="stok" id="" class="form-control" required="">
    </div>
    <div class="form-group">
        <label for="">Deskripsi</label><br>
        <textarea name="deskripsi" class="form-control" cols="30" rows="10" required=""></textarea>
    </div>
    <button class="btn btn-primary" name="tambah">Tambah</button>
</form>
<?php 
if (isset($_POST['tambah'])) 
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	$folder = '../foto_produk/';
	move_uploaded_file($lokasi, $folder.$nama);
	$koneksi->query("INSERT INTO produk (nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,stok_produk,id_kategori) 
    VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]','$_POST[stok]','$_POST[id_kategori]')");

		echo "<script>alert('Produk telah ditambahkan');</script>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>