<?php  
$a = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$b = $a->fetch_assoc();
$fotoproduk = $b['foto_produk'];
if (file_exists("../foto_produk/$fotoproduk")) {
	unlink("../foto_produk/$fotoproduk");
}

$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");

echo "<script>alert('produk terhapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";
?>