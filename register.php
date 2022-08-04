<?php 
    include 'Administrator/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Administrator/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Administrator/vendor/fontawesome-free/css/all.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar Pelanggan</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" class="form-horizontal">
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="email" placeholder="email" required>
                            </div>
                            <div class="col-md-7">
                                <input type="password" class="form-control" name="password" placeholder="password" required>
                            </div>
                            <div class="col-md-7">
                                <textarea name="alamat" id="" cols="30" rows="10" placeholder="Alamat" required></textarea>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="telepon" placeholder="telepon" required>
                            </div>
                            <button name="register" class="btn btn-info">Register</button>
                        </form>
                        <?php 
                            if (isset($_POST["register"])) {
                                $nama = $_POST["nama"];
                                $email = $_POST["email"];
                                $password = $_POST["password"];
                                $alamat = $_POST["alamat"];
                                $telepon = $_POST["telepon"];

                                $a = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
                                $b = $a->num_rows;
                                if ($b==1) {
                                    echo "<script>alert('Email sudah digunakan, Silahkan ganti akun email')</script>";
                                    echo "<script>location='register.php'</script>";
                                } else {
                                    $koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat)
                                    VALUES ('$email','$password','$nama','$telepon','$alamat')");
                                    echo "<script>alert('Email terdaftar, Silahkan login akun anda')</script>";
                                    echo "<script>location='login.php'</script>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>