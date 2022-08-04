<?php 
    session_start();
    include "Administrator/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Administrator/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Administrator/vendor/fontawesome-free/css/all.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login pelanggan</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="" class="form-control">
                            </div>
                            <button name="login" class="btn btn-primary">Login</button>
                            <p style="font-size: 12px;">Belum Punya Akun? <a href="register.php">Register</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="container"
    style="width: 600px; height: 420px; border:lavender 1px solid; border-radius: 8px; margin-top: 60px;">
    <center>
        <h3 class="pt-5">Login Pelanggan</h3>
    </center>
    <center>
    <form style="width: 530px;"">
        <div class=" form-group pt-2">
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" id="" placeholder="Password">
        </div>
        <button name="login" class="btn btn-success" style="width: 530px;">LOGIN</button>
        <p style="font-size: 12px;">Belum Punya Akun? <a href="{{url('/register')}}">Register</a></p>
    </form>
</center>
</div> -->
    <?php 
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $a = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
            $b = $a->num_rows;
            if ($b == 1) {
                $_SESSION['pelanggan'] = $a->fetch_assoc();
                echo "<script>alert('Berhasil login')</script>";
                if (empty($_SESSION["belanja"]) OR !isset($_SESSION["belanja"])) {  
                    echo "<script>location='riwayat.php';</script>";
                } else {
                    echo "<script>location='checkout.php';</script>";
                }
            } else {
                echo "<script>alert('Gagal login, periksa kembali akun anda')</script>";
                echo "<script>location='login.php'</script>";
            }
        }
    ?>
</body>

</html>