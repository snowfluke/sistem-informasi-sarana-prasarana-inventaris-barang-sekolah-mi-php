<?php 
session_start();
include ('config/conn.php');
$base_url= ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url.= "://".$_SERVER['HTTP_HOST'];
$base_url.= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

if(isset($_POST['cek_login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) && empty($password)){
        $error = 'Harap isi username dan password';
    }else{
        $user = mysqli_query($con,"SELECT * FROM tb_user WHERE username='$username' AND password ='$password'") or die(mysqli_error($con));
        if(mysqli_num_rows($user)!=0){
            $data = mysqli_fetch_array($user);
            $_SESSION['id'] = $data['id_user'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['name'] = $data['nama_user'];
            $_SESSION['role'] = $data['role_user'];
            header("Location:".$base_url);
        }else{
            $error= 'Username atau password salah!';
        }
    }
    $_SESSION['error'] = $error;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SARPRAS MI Nurjalin Pesahangan</title>

    <!-- Custom fonts for this template-->
    <link href="<?=$base_url;?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=$base_url;?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
<div align="center">
            <br>
            <div align="center" style="width:320px;margin-top:5%;">
                <form method="post" class="well well-lg p-5" action="" style="-webkit-box-shadow: 0px 0px 20px #888888;">
                    <i class="fa fa-book fa-4x"></i>
                    <h4>Selamat Datang di Sistem SARPRAS MI Nurjalin Pesahangan</h4>
                    <br>
                        <?php if(isset($_SESSION['success'])):?>
                        <div class="flash-data-berhasil" data-berhasil="<?= $_SESSION['success']; ?>"></div>
                        <?php endif; unset($_SESSION['success']);?>
                        <?php if(isset($_SESSION['error'])):?>
                        <div class="flash-data-gagal" data-gagal="<?= $_SESSION['error']; ?>"></div>
                        <?php endif; unset($_SESSION['error']);?>
                    <div class="input-group ">
                        <input required name="username" id="username" class="form-control" type="text" placeholder="Username" autocomplete="off" />
                    </div>
                    <br/>
                    <div class="input-group">
                        <input required name="password" id="password" class="form-control" type="password" placeholder="Password" autocomplete="off" />
                    </div>
                    <br />
                    <button type="submit" class="btn btn-primary btn-block" name="cek_login">Login</button>
                </form>
            </div>
        </div>
        <br>

        <footer align="center">
            Created By <a href="#" title="T.P"><i class="fa fa-copyright" aria-hidden="true">Maknum Munib</i></a>
        </footer>

            <!-- Bootstrap core JavaScript-->
    <script src="<?=$base_url;?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=$base_url;?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=$base_url;?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?=$base_url;?>assets/vendor/sweet-alert/sweetalert2.all.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=$base_url;?>assets/js/sb-admin-2.min.js"></script>
    <script src="<?=$base_url;?>assets/js/demo/sweet-alert.js"></script>

</body>

</html>