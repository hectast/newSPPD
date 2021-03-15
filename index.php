<?php
session_start();

include 'koneksi.php';
include 'app/login_cek_token.php';

// mengecek admin login atau tidak
if (!isset($_SESSION['username'])) {
  ?>
    <script>
      alert('Anda harus login untuk mengakses halaman ini!');
      window.location.href = 'login.php';
    </script>
  <?php
  return false;
}

$jdl = "Dashboard";
$ttl = $jdl . " | SPPD";

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'views/layout/header.php'; ?>

<body class="hold-transition sidebar-mini" onload="startTime()">
  <div class="wrapper">
    <?php
    include 'views/layout/navbar.php';
    include 'views/layout/sidebar.php';
    ?>
    <div class="content-wrapper">

      <section class="content-header">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" height="100%" src="assets/dist/img/banner2.jpg" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" height="100%" src="assets/dist/img/c.banner.jpg" alt="Second slide">
                  </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-lg-3 col-3">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <?php
                  $result1 = $konek->query("SELECT * FROM tbl_pjspd");
                  $result2 = $konek->query("SELECT * FROM tbl_laksanaspd");
                  $row1 =  mysqli_num_rows($result1);
                  $row2 =  mysqli_num_rows($result2);


                  ?>
                  <h3><?= $row1; ?></h3>

                  <p>Penanggung Jawab</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user-tie"></i>
                </div>
                <div class="small-box-footer">&nbsp;</div>
              </div>

            </div>
            <div class="col-lg-3 col-3">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?= $row2; ?></h3>

                  <p>Pelaksana Perjalanan</p>
                </div>
                <div class="icon">
                  <i class="fa fa-street-view"></i>
                </div>
                <div class="small-box-footer">&nbsp;</div>
              </div>

            </div>
            <div class="col-lg-3 col-3">
              <!-- small box -->
              <div class="small-box bg-yellow txc-white">
                <div class="inner">
                  <?php
                  $result = $konek->query("SELECT * FROM tbl_spd");
                  $row =  mysqli_num_rows($result);


                  ?>
                  <h3><?= $row ?></h3>

                  <p>Perjalanan Dinas</p>
                </div>
                <div class="icon">
                  <i class="fa fa-suitcase-rolling"></i>
                </div>
                <div class="small-box-footer">&nbsp;</div>
              </div>

            </div>
            <div class="col-lg-3 col-3">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?= $row / 1000 * 100 ?></h3>

                  <p>Capaian</p>
                </div>
                <div class="icon">
                  <i class="fa fa-chart-bar"></i>
                </div>
                <div class="small-box-footer">&nbsp;</div>
              </div>

            </div>

          </div>
      </section>

    </div>
    <?php include 'views/layout/footer.php'; ?>
  </div>
  <?php include 'views/layout/js.php'; ?>
</body>

</html>