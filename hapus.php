<?php 
    session_start();
    $id_produk = $_GET["id"];
    unset($_SESSION["belanja"][$id_produk]);

    echo "<script>alert('Produk terhapus');</script>";
    echo "<script>location='belanja.php';</script>";
?>