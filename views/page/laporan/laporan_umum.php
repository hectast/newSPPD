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
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $nama=$_POST['namadmin'];
    
    if($user=='' || $pass=='' ||$nama==''){
         echo "<i><b><h3><font color='red'>Form Belum Lengkap Gaezz !!! </font></h3></b></i>";
    }else{
        $simpan=mysqli_query($konek,"INSERT INTO adspd(username, password, namadmin)
                         VALUES  ('$user','$pass','$nama')");
        if(!$simpan){
        echo "Simpan data gagal";
        } 
    }
}
?> 
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
                        <center><h5>REKAP LAPORAN PERJALANAN DINAS BKP GORONTALO</h5></center>
                    </div>
                </div>
                <br>
                 <form action="cetak_lapspd.php" method="POST" ">
                    <div class="row d-flex">
                    <div class="col-sm-2">
                        <div class="form-group">
                        <select name="kategori" class="form-control">
                         <option value="laksanaspd">Kategori - </option>
                         <option value="laksanaspd">Nama</option>
                         <option value="niplaksanaspd">NIP</option>
                         <option value="jabatan">Jabatan</option>
                         <option value="nospd">No.SPD</option>
                         <option value="tglspd">Tgl.SPD</option>
                         <option value="akun">Akun</option>
                         <option value="total">Jumlah Uang</option>
                         <option value="tglspd">Bulan</option>
                         <option value="tglspd">Tahun</option>
                        </select>

                      </div>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="txtsearch" class="form-control" placeholder="Cari Data Yang Ingin Dicetak">

                    </div>
                    <div class="col-sm-1">
                        <button type="submit" name="submit" class="btn btn-block btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>

                </form>
                        <br>
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-responsive table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>NIP</th>
                    <th>JABATAN</th>
                    <th>NO.SPD</th>
                    <th>TGL.BERANGKAT</th>
                    <th>AKUN</th>
                    <th>BULAN</th>
                    <th>TAHUN</th>
                    <th>JUMLAH UANG</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                       $sql = "SELECT * FROM tbl_rinciriil ";
                       $result = mysqli_query($konek,$sql) or die('Error, list failed. ' . mysqli_error($konek));
                       $no = 1;
                       $total4 = 0;
                       while ( $row = mysqli_fetch_assoc($result)) {

                         $total4+=$row['total'];
                         // var_dump($nama);
                         // exit();

                        ?>
                        <tr>
                        <td align="center"><?= $no++; ?></td>
                        <td><?= $row["laksanaspd"]; ?></td>
                        <td><?= $row["niplaksanaspd"]; ?></td>
                        <td><?= $row["jabatan"]; ?></td>
                        <td><?= $row["nospd"]; ?></td>
                        <td><?= $row["tglspd"]; ?></td>
                        <td><?= $row["akun"]; ?></td>
                        <td><?= substr($row["tglspd"],3,-4);?></td>
                        <td><?= substr($row["tglspd"],-4,4);?></td>  
                        <td><?= number_format($row["total"],0,",","."); ?></td>
<!--                         <td><a href="#" class=" btn btn-danger" id="button_print"><i class="fa fa-print"></i></a></td> -->
                       </tr>

                        <?php

                       }

                     ?>

                  </tbody>
                </table>
                    </div>
                </div>

                </div>
            </section>

        </div>
        <?php include '../../layout/footer.php'; ?>
    </div>
    <?php include '../../layout/js.php'; ?>
</body>
</html>