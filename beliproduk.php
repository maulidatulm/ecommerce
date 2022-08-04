<?php 
    session_start();
    $id_produk = $_GET['id'];

    if (isset($_SESSION['belanja'][$id_produk])) {
        $_SESSION['belanja'][$id_produk]+=1;
    } else {
        $_SESSION['belanja'][$id_produk] = 1;
    }

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";

    echo "<script>alert('Produk telah ditambahkan ke keranjang')</script>";
    echo "<script>location='belanja.php'</script>";
?>