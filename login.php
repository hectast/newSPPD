<?php
    session_start();

    include 'koneksi.php';
    include 'app/login_cek.php';

    // mengecek admin login atau tidak
    if (isset($_SESSION['username'])) {
        header('Location: index.php');
        return false;
    }

    $ttl = "Login | SPPD";
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'views/layout/header.php'; ?>
<body class="hold-transition login-page bg-login">
    <div class="login-box mb-5 text-center text-light">
        <div class="login-logo">
            <img src="<?= $url ?>assets/dist/img/LOGO1.png" alt="logo" width="30%">
        </div>
        <h3>Aplikasi Sistem Informasi Perjalanan Dinas</h3>
        <p>Balai Karantina Pertanian Kelas II Gorontalo</p>
        <div class="card">
            <div class="card-body login-card-body">

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
        <div class="lockscreen-footer text-center">
            <small>Copyright &copy; 2021 Balai Karantina Kelas II Gorontalo</small>
        </div>
    </div>
    <?php include 'views/layout/js.php'; ?>
</body>
</html>