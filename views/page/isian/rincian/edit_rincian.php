<?php
session_start();

include '../../../../koneksi.php';
include '../../../../app/login_cek_token.php';

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
$jdl = "Form Rincian Biaya Perjalanan Dinas";
$ttl = $jdl . " | SPPD";
$idx = $_GET['id'];
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../../../layout/header.php'; ?>


<body class="hold-transition sidebar-mini" onload="startTime()">
    <div class="wrapper">
        <?php
        include '../../../layout/navbar.php';
        include '../../../layout/sidebar.php';
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
                                <li class="breadcrumb-item">Isian</li>
                                <li class="breadcrumb-item active"><?= $jdl; ?></li>
                            </ol>
                        </div><br><br>
                        <form action="proseseditrincian.php" method="POST">
                        <input name="id" type="text" hidden value="<?=$id?>">
                        <?php
                        $result = $konek->query("SELECT * FROM tbl_spd WHERE id='$id'");
                        $d = mysqli_fetch_assoc($result);

                        $result2 = $konek->query("SELECT * FROM tbl_rinciriil WHERE id='$idx'");
                        $d2 = mysqli_fetch_assoc($result2);
                        ?>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-9">
                                  
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-bordered" ;">
                                                <tr align="center">
                                                    <th rowspan="2">No</th>
                                                    <th colspan="4">Perincian Biaya</th>
                                                    <th rowspan="2">Persentase</th>
                                                    <th rowspan="2">Jumlah</th>
                                                </tr>
                                                <tr>
                                                    <td>Uraian</td>
                                                    <td>Banyaknya</td>
                                                    <td>Satuan</td>
                                                    <td>Harga Satuan (Rp)</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>

                                                    <td>
                                                        <select name="uraian1" class="form-control">
                                                            <option value="<?= $d2['uraian1'] ?>" hidden> <?= $d2['uraian1']; ?></option>
                                                            <option value="Hotel (Penginapan)">Hotel (Penginapan)</option>
                                                            <option value="Uang Harian">Uang Harian</option>
                                                            <option value="Transpor <?php echo $d['berangkat']; ?>-<?php echo $d['tujuan']; ?>">Transpor <?php echo $d['berangkat']; ?>-<?php echo $d['tujuan']; ?></option>
                                                            <option value="Transpor <?php echo $d['tujuan']; ?>-<?php echo $d['berangkat']; ?>">Transpor <?php echo $d['tujuan']; ?>-<?php echo $d['berangkat']; ?></option>
                                                            <option value="Transpor ke Bandara Slt Hasanuddin">Transpor ke Bandara Slt Hasanuddin</option>
                                                            <option value="Transpor dari Bandara ke Tujuan">Transpor dari Bandara ke Tujuan</option>
                                                            <option value="Uang Representatif">Uang Representatif</option>
                                                            <option value="Sewa Kendaraan">Sewa Kendaraan</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="banyak1" class="form-control">

                                                            <option value="<?= $d2['banyak1'] ?>" hidden><?= $d2['banyak1'] ?></option>
                                                            <option value="1">1 (satu)</option>
                                                            <option value="2">2 (dua)</option>
                                                            <option value="3">3 (tiga)</option>
                                                            <option value="4">4 (empat)</option>
                                                            <option value="5">5 (lima)</option>
                                                            <option value="6">6 (enam)</option>
                                                            <option value="7">7 (tujuh)</option>
                                                        </select>
                                                        </font>
                                                    </td>
                                                    <td>

                                                        <select name="satuan1" class="form-control">

                                                            <option value="<?= $d2['satuan1'] ?>"><?= $d2['satuan1'] ?></option>
                                                            <option value="Malam">Malam</option>
                                                            <option value="Hari">Hari</option>
                                                            <option value="Kali">Kali</option>
                                                        </select>

                                                    </td>
                                                    <td>

                                                        <input type="text" name="hargasatuan1" value="<?= $d2['hargasatuan1'] ?>" class="form-control" />
                                                        <small class="text-danger">Beri tanda "-" bila kolom ini tidak terisi</small>


                                                    </td>
                                                    <td>

                                                        <select name="persen1" class="form-control">

                                                            <option value="<?= $d2['persen1'] ?>">
                                                            <?php
                                                            if($d2['persen1'] == 1){
                                                                echo"100%";
                                                            }else{
                                                                echo"30%";
                                                            }

                                                            
                                                            ?></option>
                                                            <option value="1">100%</option>
                                                            <option value="0.3">30%</option>
                                                        </select>
                                                      

                                                    </td>
                                                    <td>
                                                    <input readonly type="text" class="form-control" value="<?= $d2['jumlah1'] ?>" name="jumlah1">
                                                    </td>

                                                </tr>




                                                <tr>
                                                    <td>2</td>

                                                    <td>
                                                        <select name="uraian2" class="form-control">
                                                            <option value="<?= $d2['uraian2'] ?>" hidden><?= $d2['uraian2'] ?></option>
                                                            <option value="Hotel (Penginapan)">Hotel (Penginapan)</option>
                                                            <option value="Uang Harian">Uang Harian</option>
                                                            <option value="Transpor <?php echo $d['berangkat']; ?>-<?php echo $d['tujuan']; ?>">Transpor <?php echo $d['berangkat']; ?>-<?php echo $d['tujuan']; ?></option>
                                                            <option value="Transpor <?php echo $d['tujuan']; ?>-<?php echo $d['berangkat']; ?>">Transpor <?php echo $d['tujuan']; ?>-<?php echo $d['berangkat']; ?></option>
                                                            <option value="Transpor ke Bandara Slt Hasanuddin">Transpor ke Bandara Slt Hasanuddin</option>
                                                            <option value="Transpor dari Bandara ke Tujuan">Transpor dari Bandara ke Tujuan</option>
                                                            <option value="Uang Representatif">Uang Representatif</option>
                                                            <option value="Sewa Kendaraan">Sewa Kendaraan</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="banyak2" class="form-control">

                                                            <option value="<?= $d2['banyak2'] ?>" hidden><?= $d2['banyak2'] ?></option>
                                                            <option value="1">1 (satu)</option>
                                                            <option value="2">2 (dua)</option>
                                                            <option value="3">3 (tiga)</option>
                                                            <option value="4">4 (empat)</option>
                                                            <option value="5">5 (lima)</option>
                                                            <option value="6">6 (enam)</option>
                                                            <option value="7">7 (tujuh)</option>
                                                        </select>
                                                        </font>
                                                    </td>
                                                    <td>

                                                        <select name="satuan2" class="form-control">

                                                            <option value="<?= $d2['satuan2'] ?>"><?= $d2['satuan2'] ?></option>
                                                            <option value="Malam">Malam</option>
                                                            <option value="Hari">Hari</option>
                                                            <option value="Kali">Kali</option>
                                                        </select>

                                                    </td>
                                                    <td>

                                                        <input type="text" name="hargasatuan2" value="<?= $d2['hargasatuan2'] ?>" class="form-control" />
                                                        <small class="text-danger">Beri tanda "-" bila kolom ini tidak terisi</small>


                                                    </td>
                                                    <td>

                                                        <select name="persen2" class="form-control">

                                                            <option value="<?= $d2['persen2'] ?>">
                                                            <?php
                                                            if($d2['persen2'] == 1){
                                                                echo"100%";
                                                            }else{
                                                                echo"30%";
                                                            }

                                                            
                                                            ?></option>
                                                            <option value="1">100%</option>
                                                            <option value="0.3">30%</option>
                                                        </select>
                                                      

                                                    </td>
                                                    <td>
                                                    <input readonly class="form-control" type="text" value="<?= $d2['jumlah2'] ?>" name="jumlah2">
                                                    </td>

                                                </tr>





                                                <tr>
                                                    <td>3</td>

                                                    <td>
                                                        <select name="uraian3" class="form-control">
                                                            <option value="<?= $d2['uraian3'] ?>" hidden><?= $d2['uraian3']; ?></option>
                                                            <option value="Hotel (Penginapan)">Hotel (Penginapan)</option>
                                                            <option value="Uang Harian">Uang Harian</option>
                                                            <option value="Transpor <?php echo $d['berangkat']; ?>-<?php echo $d['tujuan']; ?>">Transpor <?php echo $d['berangkat']; ?>-<?php echo $d['tujuan']; ?></option>
                                                            <option value="Transpor <?php echo $d['tujuan']; ?>-<?php echo $d['berangkat']; ?>">Transpor <?php echo $d['tujuan']; ?>-<?php echo $d['berangkat']; ?></option>
                                                            <option value="Transpor ke Bandara Slt Hasanuddin">Transpor ke Bandara Slt Hasanuddin</option>
                                                            <option value="Transpor dari Bandara ke Tujuan">Transpor dari Bandara ke Tujuan</option>
                                                            <option value="Uang Representatif">Uang Representatif</option>
                                                            <option value="Sewa Kendaraan">Sewa Kendaraan</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="banyak3" class="form-control">

                                                            <option value="<?= $d2['banyak3'] ?>" hidden><?= $d2['banyak3'] ?></option>
                                                            <option value="1">1 (satu)</option>
                                                            <option value="2">2 (dua)</option>
                                                            <option value="3">3 (tiga)</option>
                                                            <option value="4">4 (empat)</option>
                                                            <option value="5">5 (lima)</option>
                                                            <option value="6">6 (enam)</option>
                                                            <option value="7">7 (tujuh)</option>
                                                        </select>
                                                        </font>
                                                    </td>
                                                    <td>

                                                        <select name="satuan3" class="form-control">

                                                            <option value="<?= $d2['satuan3'] ?>"><?= $d2['satuan3'] ?></option>
                                                            <option value="Malam">Malam</option>
                                                            <option value="Hari">Hari</option>
                                                            <option value="Kali">Kali</option>
                                                        </select>

                                                    </td>
                                                    <td>

                                                        <input type="text" name="hargasatuan3" value="<?= $d2['hargasatuan3'] ?>" class="form-control" />
                                                        <small class="text-danger">Beri tanda "-" bila kolom ini tidak terisi</small>


                                                    </td>
                                                    <td>

                                                        <select name="persen3" class="form-control">

                                                            <option value="<?= $d2['persen3'] ?>">
                                                            <?php
                                                            if($d2['persen1'] == 1){
                                                                echo"100%";
                                                            }else{
                                                                echo"30%";
                                                            }

                                                            
                                                            ?></option>
                                                            <option value="1">100%</option>
                                                            <option value="0.3">30%</option>
                                                        </select>
                                                      

                                                    </td>
                                                    <td>
                                                    <input readonly class="form-control" type="text" value="<?= $d2['jumlah3'] ?>" name="jumlah3">
                                                    </td>

                                                </tr>




                                                <tr>
                                                    <td>4</td>

                                                    <td>
                                                        <select name="uraian4" class="form-control">
                                                            <option value="<?= $d2['uraian4'] ?>" hidden><?= $d2['uraian4']; ?></option>
                                                            <option value="Hotel (Penginapan)">Hotel (Penginapan)</option>
                                                            <option value="Uang Harian">Uang Harian</option>
                                                            <option value="Transpor <?php echo $d['berangkat']; ?>-<?php echo $d['tujuan']; ?>">Transpor <?php echo $d['berangkat']; ?>-<?php echo $d['tujuan']; ?></option>
                                                            <option value="Transpor <?php echo $d['tujuan']; ?>-<?php echo $d['berangkat']; ?>">Transpor <?php echo $d['tujuan']; ?>-<?php echo $d['berangkat']; ?></option>
                                                            <option value="Transpor ke Bandara Slt Hasanuddin">Transpor ke Bandara Slt Hasanuddin</option>
                                                            <option value="Transpor dari Bandara ke Tujuan">Transpor dari Bandara ke Tujuan</option>
                                                            <option value="Uang Representatif">Uang Representatif</option>
                                                            <option value="Sewa Kendaraan">Sewa Kendaraan</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="banyak4" class="form-control">

                                                            <option value="<?= $d2['banyak4'] ?>" hidden><?= $d2['banyak4'] ?></option>
                                                            <option value="1">1 (satu)</option>
                                                            <option value="2">2 (dua)</option>
                                                            <option value="3">3 (tiga)</option>
                                                            <option value="4">4 (empat)</option>
                                                            <option value="5">5 (lima)</option>
                                                            <option value="6">6 (enam)</option>
                                                            <option value="7">7 (tujuh)</option>
                                                        </select>
                                                        </font>
                                                    </td>
                                                    <td>

                                                        <select name="satuan4" class="form-control">

                                                            <option value="<?= $d2['satuan4'] ?>"><?= $d2['satuan4'] ?></option>
                                                            <option value="Malam">Malam</option>
                                                            <option value="Hari">Hari</option>
                                                            <option value="Kali">Kali</option>
                                                        </select>

                                                    </td>
                                                    <td>

                                                        <input type="text" name="hargasatuan4" value="<?= $d2['hargasatuan4'] ?>" class="form-control" />
                                                        <small class="text-danger">Beri tanda "-" bila kolom ini tidak terisi</small>


                                                    </td>
                                                    <td>

                                                        <select name="persen4" class="form-control">

                                                            <option value="<?= $d2['persen4'] ?>">
                                                            <?php
                                                            if($d2['persen4'] == 1){
                                                                echo"100%";
                                                            }else{
                                                                echo"30%";
                                                            }

                                                            
                                                            ?></option>
                                                            <option value="1">100%</option>
                                                            <option value="0.3">30%</option>
                                                        </select>
                                                      

                                                    </td>
                                                    <td>
                                                    <input readonly class="form-control" type="text" value="<?= $d2['jumlah4'] ?>" name="jumlah4">
                                                    </td>

                                                </tr>



                                                <tr>
                                                    <td>5</td>

                                                    <td>
                                                        <select name="uraian5" class="form-control">
                                                            <option value="<?= $d2['uraian5'] ?>" hidden><?= $d2['uraian5']; ?></option>
                                                            <option value="Hotel (Penginapan)">Hotel (Penginapan)</option>
                                                            <option value="Uang Harian">Uang Harian</option>
                                                            <option value="Transpor <?php echo $d['berangkat']; ?>-<?php echo $d['tujuan']; ?>">Transpor <?php echo $d['berangkat']; ?>-<?php echo $d['tujuan']; ?></option>
                                                            <option value="Transpor <?php echo $d['tujuan']; ?>-<?php echo $d['berangkat']; ?>">Transpor <?php echo $d['tujuan']; ?>-<?php echo $d['berangkat']; ?></option>
                                                            <option value="Transpor ke Bandara Slt Hasanuddin">Transpor ke Bandara Slt Hasanuddin</option>
                                                            <option value="Transpor dari Bandara ke Tujuan">Transpor dari Bandara ke Tujuan</option>
                                                            <option value="Uang Representatif">Uang Representatif</option>
                                                            <option value="Sewa Kendaraan">Sewa Kendaraan</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="banyak5" class="form-control">

                                                            <option value="<?= $d2['banyak5'] ?>" hidden><?= $d2['banyak5'] ?></option>
                                                            <option value="1">1 (satu)</option>
                                                            <option value="2">2 (dua)</option>
                                                            <option value="3">3 (tiga)</option>
                                                            <option value="4">4 (empat)</option>
                                                            <option value="5">5 (lima)</option>
                                                            <option value="6">6 (enam)</option>
                                                            <option value="7">7 (tujuh)</option>
                                                        </select>
                                                        </font>
                                                    </td>
                                                    <td>

                                                        <select name="satuan5" class="form-control">

                                                            <option value="<?= $d2['satuan5'] ?>"><?= $d2['satuan5'] ?></option>
                                                            <option value="Malam">Malam</option>
                                                            <option value="Hari">Hari</option>
                                                            <option value="Kali">Kali</option>
                                                        </select>

                                                    </td>
                                                    <td>

                                                        <input type="text" name="hargasatuan5" value="<?= $d2['hargasatuan5'] ?>" class="form-control" />
                                                        <small class="text-danger">Beri tanda "-" bila kolom ini tidak terisi</small>


                                                    </td>
                                                    <td>

                                                        <select name="persen5" class="form-control">

                                                            <option value="<?= $d2['persen5'] ?>">
                                                            <?php
                                                            if($d2['persen5'] == 1){
                                                                echo"100%";
                                                            }else{
                                                                echo"30%";
                                                            }

                                                            
                                                            ?></option>
                                                            <option value="1">100%</option>
                                                            <option value="0.3">30%</option>
                                                        </select>
                                                      

                                                    </td>
                                                    <td>
                                                    <input readonly class="form-control" type="text" value="<?= $d2['jumlah5'] ?>" name="jumlah5">
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>6</td>

                                                    <td>
                                                        <select name="uraian6" class="form-control">
                                                            <option value="<?= $d2['uraian6'] ?>" hidden><?= $d2['uraian6']; ?></option>
                                                            <option value="Hotel (Penginapan)">Hotel (Penginapan)</option>
                                                            <option value="Uang Harian">Uang Harian</option>
                                                            <option value="Transpor <?php echo $d['berangkat']; ?>-<?php echo $d['tujuan']; ?>">Transpor <?php echo $d['berangkat']; ?>-<?php echo $d['tujuan']; ?></option>
                                                            <option value="Transpor <?php echo $d['tujuan']; ?>-<?php echo $d['berangkat']; ?>">Transpor <?php echo $d['tujuan']; ?>-<?php echo $d['berangkat']; ?></option>
                                                            <option value="Transpor ke Bandara Slt Hasanuddin">Transpor ke Bandara Slt Hasanuddin</option>
                                                            <option value="Transpor dari Bandara ke Tujuan">Transpor dari Bandara ke Tujuan</option>
                                                            <option value="Uang Representatif">Uang Representatif</option>
                                                            <option value="Sewa Kendaraan">Sewa Kendaraan</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="banyak6" class="form-control">

                                                            <option value="<?= $d2['banyak6'] ?>" hidden><?= $d2['banyak6'] ?></option>
                                                            <option value="1">1 (satu)</option>
                                                            <option value="2">2 (dua)</option>
                                                            <option value="3">3 (tiga)</option>
                                                            <option value="4">4 (empat)</option>
                                                            <option value="5">5 (lima)</option>
                                                            <option value="6">6 (enam)</option>
                                                            <option value="7">7 (tujuh)</option>
                                                        </select>
                                                        </font>
                                                    </td>
                                                    <td>

                                                        <select name="satuan6" class="form-control">

                                                            <option value="<?= $d2['satuan6'] ?>"><?= $d2['satuan6'] ?></option>
                                                            <option value="Malam">Malam</option>
                                                            <option value="Hari">Hari</option>
                                                            <option value="Kali">Kali</option>
                                                        </select>

                                                    </td>
                                                    <td>

                                                        <input type="text" name="hargasatuan6" value="<?= $d2['hargasatuan6'] ?>" class="form-control" />
                                                        <small class="text-danger">Beri tanda "-" bila kolom ini tidak terisi</small>


                                                    </td>
                                                    <td>

                                                        <select name="persen6" class="form-control">

                                                            <option value="<?= $d2['persen6'] ?>">
                                                            <?php
                                                            if($d2['persen6'] == 1){
                                                                echo"100%";
                                                            }else{
                                                                echo"30%";
                                                            }

                                                            
                                                            ?></option>
                                                            <option value="1">100%</option>
                                                            <option value="0.3">30%</option>
                                                        </select>
                                                      

                                                    </td>
                                                    <td>
                                                    <input readonly class="form-control" type="text" value="<?= $d2['jumlah6'] ?>" name="jumlah6">
                                                    </td>

                                                </tr>


                                                <tr>
                                                    <td>7</td>

                                                    <td>
                                                        <select name="uraian7" class="form-control">
                                                            <option value="<?= $d2['uraian7'] ?>" hidden><?= $d2['uraian7']; ?></option>
                                                            <option value="Hotel (Penginapan)">Hotel (Penginapan)</option>
                                                            <option value="Uang Harian">Uang Harian</option>
                                                            <option value="Transpor <?php echo $d['berangkat']; ?>-<?php echo $d['tujuan']; ?>">Transpor <?php echo $d['berangkat']; ?>-<?php echo $d['tujuan']; ?></option>
                                                            <option value="Transpor <?php echo $d['tujuan']; ?>-<?php echo $d['berangkat']; ?>">Transpor <?php echo $d['tujuan']; ?>-<?php echo $d['berangkat']; ?></option>
                                                            <option value="Transpor ke Bandara Slt Hasanuddin">Transpor ke Bandara Slt Hasanuddin</option>
                                                            <option value="Transpor dari Bandara ke Tujuan">Transpor dari Bandara ke Tujuan</option>
                                                            <option value="Uang Representatif">Uang Representatif</option>
                                                            <option value="Sewa Kendaraan">Sewa Kendaraan</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="banyak7" class="form-control">

                                                            <option value="<?= $d2['banyak7'] ?>" hidden><?= $d2['banyak7'] ?></option>
                                                            <option value="1">1 (satu)</option>
                                                            <option value="2">2 (dua)</option>
                                                            <option value="3">3 (tiga)</option>
                                                            <option value="4">4 (empat)</option>
                                                            <option value="5">5 (lima)</option>
                                                            <option value="6">6 (enam)</option>
                                                            <option value="7">7 (tujuh)</option>
                                                        </select>
                                                        </font>
                                                    </td>
                                                    <td>

                                                        <select name="satuan7" class="form-control">

                                                            <option value="<?= $d2['satuan7'] ?>"><?= $d2['satuan7'] ?></option>
                                                            <option value="Malam">Malam</option>
                                                            <option value="Hari">Hari</option>
                                                            <option value="Kali">Kali</option>
                                                        </select>

                                                    </td>
                                                    <td>

                                                        <input type="text" name="hargasatuan7" value="<?= $d2['hargasatuan7'] ?>" class="form-control" />
                                                        <small class="text-danger">Beri tanda "-" bila kolom ini tidak terisi</small>


                                                    </td>
                                                    <td>

                                                        <select name="persen7" class="form-control">

                                                            <option value="<?= $d2['persen7'] ?>">
                                                            <?php
                                                            if($d2['persen7'] == 1){
                                                                echo"100%";
                                                            }else{
                                                                echo"30%";
                                                            }

                                                            
                                                            ?></option>
                                                            <option value="1">100%</option>
                                                            <option value="0.3">30%</option>
                                                        </select>
                                                      

                                                    </td>
                                                    <td>
                                                    <input readonly class="form-control" type="text" value="<?= $d2['jumlah7'] ?>" name="jumlah7">
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8</td>

                                                    <td>
                                                        <select name="uraian8" class="form-control">
                                                            <option value="<?= $d2['uraian8'] ?>" hidden><?= $d2['uraian8']; ?></option>
                                                            <option value="Hotel (Penginapan)">Hotel (Penginapan)</option>
                                                            <option value="Uang Harian">Uang Harian</option>
                                                            <option value="Transpor <?php echo $d['berangkat']; ?>-<?php echo $d['tujuan']; ?>">Transpor <?php echo $d['berangkat']; ?>-<?php echo $d['tujuan']; ?></option>
                                                            <option value="Transpor <?php echo $d['tujuan']; ?>-<?php echo $d['berangkat']; ?>">Transpor <?php echo $d['tujuan']; ?>-<?php echo $d['berangkat']; ?></option>
                                                            <option value="Transpor ke Bandara Slt Hasanuddin">Transpor ke Bandara Slt Hasanuddin</option>
                                                            <option value="Transpor dari Bandara ke Tujuan">Transpor dari Bandara ke Tujuan</option>
                                                            <option value="Uang Representatif">Uang Representatif</option>
                                                            <option value="Sewa Kendaraan">Sewa Kendaraan</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="banyak8" class="form-control">

                                                            <option value="<?= $d2['banyak8'] ?>" hidden><?= $d2['banyak8'] ?></option>
                                                            <option value="1">1 (satu)</option>
                                                            <option value="2">2 (dua)</option>
                                                            <option value="3">3 (tiga)</option>
                                                            <option value="4">4 (empat)</option>
                                                            <option value="5">5 (lima)</option>
                                                            <option value="6">6 (enam)</option>
                                                            <option value="7">7 (tujuh)</option>
                                                        </select>
                                                        </font>
                                                    </td>
                                                    <td>

                                                        <select name="satuan8" class="form-control">

                                                            <option value="<?= $d2['satuan8'] ?>"><?= $d2['satuan8'] ?></option>
                                                            <option value="Malam">Malam</option>
                                                            <option value="Hari">Hari</option>
                                                            <option value="Kali">Kali</option>
                                                        </select>

                                                    </td>
                                                    <td>

                                                        <input type="text" name="hargasatuan8" value="<?= $d2['hargasatuan8'] ?>" class="form-control" />
                                                        <small class="text-danger">Beri tanda "-" bila kolom ini tidak terisi</small>


                                                    </td>
                                                    <td>

                                                        <select name="persen8" class="form-control">

                                                            <option value="<?= $d2['persen8'] ?>">
                                                            <?php
                                                            if($d2['persen8'] == 1){
                                                                echo"100%";
                                                            }else{
                                                                echo"30%";
                                                            }

                                                            
                                                            ?></option>
                                                            <option value="1">100%</option>
                                                            <option value="0.3">30%</option>
                                                        </select>
                                                      

                                                    </td>
                                                    <td>
                                                    <input readonly class="form-control" type="text" value="<?= $d2['jumlah8'] ?>" name="jumlah8">
                                                    </td>

                                                </tr>

                                            </table>
                                           <br>
                                           <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                           <a href="tampil_cetakrincian.php" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        </div>
                                        
                                    </div>  
                                    
                                </div>
                                <div class="col-3">
                                    <div class="card">
                                        <div class="card-header">
                                            Data Pelaksana
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Nama Pelaksana</label>
                                                <input type="text" name="laksanaspd" class="form-control" value="<?= $d['laksanaspd'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>NIP</label>
                                                <input type="text" name="niplaksanaspd" class="form-control" value="<?= $d['niplaksanaspd'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Jabatan</label>
                                                <input type="text" name="jabatan" class="form-control" value="<?= $d['jabatan']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Lampiran SPPD Nomor</label>
                                                <input type="text" name="nospd" value="<?= $d['nospd'] ?>" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Tanggal</label>
                                                <input type="text" name="tglspd" value="<?= $d['tglspt']; ?>" class="form-control" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Maksud Perjalanan</label>
                                                <input type="text" name="maksud" class="form-control" value="<?= $d['maksud'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Pembebanan Anggaran (akun)</label>
                                                <input type="text" name="akun" class="form-control" value="<?= $d['akun']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>



            </section>

        </div>
        <?php include '../../../layout/footer.php'; ?>
    </div>
    <?php include '../../../layout/js.php'; ?>
    <script>
        $('#modalhapus').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    </script>
</body>

</html>