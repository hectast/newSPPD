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
    $jdl = "Laporan";
    $ttl = $jdl . " | SPPD";
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

                <div class="row">
                    <div class="col-sm-12">
                        <center><h5>LAPORAN JUMLAH HARI PERJALANAN</h5></center>
                    </div>
                </div>
                <br>
                <form role="form" action="" method="get">
          <div class="form-group">
                    <div class="row">
                    <div class="col-sm-2 fo"><input type="text" name="cari" class="form-control" placeholder="Nama"></div>
                   <div class="col-sm-2 fo"><input type="text" name="cari2" class="form-control" placeholder="Nip"></div>
                   <div class="col-sm-2 fo"><input type="text" name="cari3" class="form-control" placeholder="Bulan"></div>
                    <div class="col-sm-1"><button type="submit" name="simpan" class="form-control btn btn-primary"><i class="fa fa-search"></i></button></div>

                     
                </div>
        </div>
          
    </center>   
        <?php
        ini_set("display_errors",0);
        ?>
        
        <br>


          
            </form> 

                    
            </div>
            </section>
            <div class="content">
                      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <a href="#" class="no-print btn btn-danger" onclick="window.print();"><i class="fas fa-print"></i> Cetak</a>
                <br><br> 
                <table class ="table table-bordered table-striped" min-width="100%" >
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
          
          <?php


          if(isset($_GET['simpan'])){
          $cari = $_GET['cari'];
          $cari2 = $_GET['cari2'];
          $cari3 = $_GET['cari3']; 
          $gabung = "";

          if ($cari != "") {
          $gabung .= "AND laksanaspd like '%".$cari."%'";
          }
          if ($cari2 != "") {
          $gabung .= "AND niplaksanaspd like '%".$cari2."%'";
          } 
          if ($cari3 != "") {
          $gabung .= "AND tglberangkat like '%".$cari3."%'";
          } 
          $gabung = "WHERE " .ltrim($gabung, "AND ");
          $data = mysqli_query($konek,"select * from tbl_spd  $gabung");
          while($d = mysqli_fetch_array($data)){
            
          $total4+=$d['lama'];  
          ?>
          <tr>
        
            <td align="center"><?php echo $i=$i+1; ?></td>
            <td><?php echo $d['laksanaspd']; ?></td>
            <td><?php echo $d['niplaksanaspd']; ?></td>
            <td><?php echo $d['jabatan']; ?></td>
            <td><?php echo $d['nospd']; ?></td>
            <td><?php echo $d['tglberangkat']; ?></td>
            <td><?php echo $d['tglkembali']; ?></td>
            <td><?php echo $d['lama']; ?></td>
            <td><?php echo $d['akun']; ?></td>
            <td><?php echo substr ($d['tglberangkat'],3); ?></td>
            <td><?php echo substr ($d['tglberangkat'],-4,4); ?></td>
          </tr>
          <?php }
          } 
           
          ?>
          <tr>
  <td colspan ="7" align ="Left"><B>Total<B></td>
  <td align ="right"><B><?php echo $total4;?> hari</B></td>
  <td align ="right"><B> </B></td>
  <td align ="right"><B> </B></td>
   <td align ="right"><B> </B></td>
   
</tr>
            
        </table>
<br>
<?php include ("ttd.php");?>
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