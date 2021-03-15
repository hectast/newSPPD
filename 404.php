<?php
    $ttl = "404 | SPPD";
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'views/layout/header.php'; ?>
<body class="hold-transition login-page">
    <div class="text-center">
        <div class="login-box mb-5">

            <h1 class="display-1 txc-yellow">404</h1>
            <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

          <p>
            Kami tidak dapat menemukan halaman yang Anda cari.
          </p>

          <form class="search-form">
            <a href="<?= $url; ?>login.php" class="btn btn-primary">Kembali</a>
            <!-- /.input-group -->
          </form>
        </div>
        <!-- /.error-content -->
        </div>
    </div>
    <?php include 'views/layout/js.php'; ?>
</body>
</html>