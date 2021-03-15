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
                        <center><h5>REKAP LAPORAN PERJALANAN DINAS BKP GORONTALO</h5></center>
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
                    <th style="min-width: 110px; max-width: 110px;">NAMA</th>
                    <th style="min-width: 70px; max-width: 70px;">NIP</th>
                    <th style="min-width: 110px; max-width: 110px;">JABATAN</th>
                    <th style="min-width: 110px; max-width: 110px;">NO.SPD</th>
                    <th style="min-width: 60px; max-width: 60px;">TGL.SPD</th>
                    <th style="min-width: 40px; max-width: 40px;">AKUN</th>
                    <th style="min-width: 50px; max-width: 50px;">BULAN</th>
                    <th style="min-width: 50px; max-width: 50px;">TAHUN</th>
                    <th style="min-width: 90px; max-width: 90px;">JUMLAH UANG</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      if (isset($_POST['submit'])) {
                       $search = $_POST['txtsearch'];
                       $kategori = $_POST['kategori'];
                       
                       
                       $sql = "SELECT * FROM tbl_rinciriil WHERE $kategori LIKE '%$search%'";
                       $result = mysqlI_query($konek,$sql) or die('Error, list failed. ' . mysqli_error($konek));
                       $i=0;
                      $total4=0;
                       
                       
                       
                       
                       if (mysqli_num_rows($result) == 0) {
                        echo '<p><b><i><font color = "red">Maaf, Data tidak ditemukan ataukah Anda salah menentukan kategori. Terima Kasih</font></I><b></p>';
                       } else {
                        echo '<p></p>';
                        while ($row = mysqli_fetch_array($result)) {
                        extract($row);
                      
                       $total4+=$row['total'];

                     ?>
 
                   <tr>
                           <td align="center"><?php echo $i=$i+1; ?></td>
                         <td><?php echo '<p>'.$laksanaspd.'</p>';?></td>
                           <td><?php echo '<p>'.$niplaksanaspd.'</p>';?></td>
                         <td><?php echo '<p>'.$jabatan.'</p>';?></td>
                         <td><?php echo '<p>'.$nospd.'</p>';?></td>
                           <td><?php echo '<p>'.$tglspd.'</p>';?></td>
                          <td><?php echo '<p> '.$akun.'</p>';?></td>
                         <td><?= substr($row["tglspd"],3,-4);?></td>
                        <td><?= substr($row["tglspd"],-4,4);?></td>  
                        <td align="right"><?php echo '<p> '.number_format($total,0,",",".").'</p>';?></td>
                       </tr>
                       <?php
                          }
                         }
                        }
                      ?>
                      <tr>
                        <td colspan ="9" align ="Left"><B>Total<B></td>
                        <td align ="right"><B><?php echo number_format($total4,0,",","."); ?></B></B></td>
                         
                      </tr>

                      <tr>
                        <td colspan ="11" align ="Left"><B>Terbilang : 
                        <?php 
                        function penyebut($nilai) {
                          $nilai = abs($nilai);
                          $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
                          $temp = "";
                          if ($nilai < 12) {
                            $temp = " ". $huruf[$nilai];
                          } else if ($nilai <20) {
                            $temp = penyebut($nilai - 10). " Belas";
                          } else if ($nilai < 100) {
                            $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
                          } else if ($nilai < 200) {
                            $temp = " Seratus" . penyebut($nilai - 100);
                          } else if ($nilai < 1000) {
                            $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
                          } else if ($nilai < 2000) {
                            $temp = " Seribu" . penyebut($nilai - 1000);
                          } else if ($nilai < 1000000) {
                            $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
                          } else if ($nilai < 1000000000) {
                            $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
                          } else if ($nilai < 1000000000000) {
                            $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
                          } else if ($nilai < 1000000000000000) {
                            $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
                          }     
                          return $temp;
                        }
                        function terbilang($nilai) {
                          if($nilai<0) {
                            $hasil = "minus ". trim(penyebut($nilai));
                          } else {
                            $hasil = trim(penyebut($nilai));
                          }         
                          return $hasil;
                        }
                        $angka = $total4;
                        ?>
                        <b><i><?php echo terbilang ($angka);?> Rupiah</i></b>
                        </font></td>
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