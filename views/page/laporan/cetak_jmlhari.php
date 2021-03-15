<?php
session_start();

include '../../../koneksi.php';
include '../../../app/login_cek_token.php';

// mengecek admin login atau tidak
if (!isset($_SESSION['username'])) {
  ?>
    <script>
      alert('Anda harus login untuk mengakses halaman ini!');
      window.location.href = '../../../login.php';
    </script>
  <?php
  return false;
}
    $jdl = "Laporan Umum";
    $ttl = $jdl . " | SPPD";
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../../layout/header.php'; ?>
<Style type="text/css">
    @media print{
      .no-print{
        display:none;
      }
    }
</Style>
<body class="hold-transition sidebar-mini" onload="startTime()">
    <div class="wrapper">
        <?php
            include '../../layout/navbar.php';
            include '../../layout/sidebar.php';
        ?>
        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?= $jdl; ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Laporan</li>
                                <li class="breadcrumb-item active"><?= $jdl; ?></li>
                            </ol>
                        </div>
                    </div>

                
                </div>
       
              
            </section>
            <div class="content">
              <div class="card">
                <div class="row">
                    <div class="col-sm-12">
                        <br>
                        <center><h5>REKAP LAPORAN  PERJALANAN DINAS BKP GORONTALO</h5></center>
                    </div>
                </div>
                <br>
                <div class="row">
              <div class="col-sm-12">
                    <div class="card">
              <div class="card-body">
                <a href="#" class="no-print btn btn-danger" onclick="window.print();"><i class="fas fa-print"></i> Cetak</a>  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th style="min-width: 50px; max-width: 50px;">NAMA</th>
                    <th style="min-width: 30px; max-width: 30px;">NIP</th>
                    <th style="min-width: 50px; max-width: 50px;">JABATAN</th>
                    <th style="min-width: 50px; max-width: 50px;">NO.SPD</th>
                    <th style="min-width: 40px; max-width: 40px;">TGL.KEMBALI</th>
                    <th style="min-width: 40px; max-width: 40px;">TGL.BERAGKAT</th>
                    <th style="min-width: 20px; max-width: 20px;">LAMA</th>
                    <th style="min-width: 50px; max-width: 50px;">AKUN</th>
                    <th style="min-width: 50px; max-width: 50px;">BULAN</th>
                    <th style="min-width: 50px; max-width: 50px;">TAHUN</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php
                        if (isset($_POST['submit'])) {
                         $search = $_POST['txtsearch'];
                         $kategori = $_POST['kategori'];
                         
                         
                         $sql = "SELECT * FROM tbl_spd WHERE $kategori LIKE '%$search%'";
                         $result = mysqli_query($konek, $sql) or die('Error, list failed. ' . mysqli_error($konek));
                          
                         $i=0;
                        $total4=0;
                         
                         
                         
                         
                         if (mysqli_num_rows($result) == 0) {
                          echo '<p><b><i><font color = "red">Maaf, Data tidak ditemukan ataukah Anda salah menentukan kategori. Terima Kasih</font></I><b></p>';
                         } else {
                          echo '<p></p>';
                          while ($row = mysqli_fetch_array($result)) {
                          extract($row);
                        $total4+=$row['lama'];
                         

                       ?>
 
                       
                     <tr>
                         <td align="center"><?php echo $i=$i+1; ?></td>
                       <td><?php echo '<p>'.$laksanaspd.'</p>';?></td>
                         <td><?php echo '<p>'.$niplaksanaspd.'</p>';?></td>
                       <td><?php echo '<p>'.$jabatan.'</p>';?></td>
                       <td><?php echo '<p>'.$nospd.'</p>';?></td>
                       <td><?php echo '<p>'.$tglberangkat.'</p>';?></td>
                       <td><?php echo '<p>'.$tglkembali.'</p>';?></td>
                       <td><?php echo '<p>'.$lama.'</p>';?></td>
                        <td><?php echo '<p> '.$akun.'</p>';?></td>
                        <td><?= date("M", strtotime($row["tglspt"])); ?></td>
                          <td><?php echo '<p> '.substr($tglberangkat,-4,4).'</p>';?></td>  
              
                     </tr>
                     <?php

                        }
                       }
                      }
                    ?>
                    <tr>
                      <td colspan ="7" align ="Left"><B>Total<B></td>
                       
                      <td align ="right"><B><?= $total4; ?> hari</B></td>
                      <td align ="right"><B> </B></td>
                      <td align ="right"><B> </B></td>
                      <td></td>
              
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="row">
              <div class="col-sm-12">
                  <?php include ("ttd.php"); ?>
              </div>
            </div>
              </div>
            </div>
        </div>
    </div>

        <?php include '../../layout/footer.php'; ?>
    </div>
    <?php include '../../layout/js.php'; ?>
</body>
</html>