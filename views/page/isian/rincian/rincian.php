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
                        <form action="prosessimpanrincian.php" method="POST">
                        <input name="id" type="text" hidden value="<?=$id?>">
                        <?php
                        $result = $konek->query("SELECT * FROM tbl_spd WHERE id='$id'");
                        $d = mysqli_fetch_assoc($result);
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
                                                            <option value="-">-</option>
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

                                                            <option value="-">-</option>
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

                                                            <option value="-">-</option>
                                                            <option value="Malam">Malam</option>
                                                            <option value="Hari">Hari</option>
                                                            <option value="Kali">Kali</option>
                                                        </select>

                                                    </td>
                                                    <td>

                                                        <input type="text" name="hargasatuan1" value=" " class="form-control" />
                                                        <small class="text-danger">Beri tanda "-" bila kolom ini tidak terisi</small>


                                                    </td>
                                                    <td>

                                                        <select name="persen1" class="form-control">

                                                            <option value="1">100%</option>
                                                            <option value="0.3">30%</option>
                                                        </select>

                                                    </td>

                                                </tr>




                                                <tr>
                                                    <td>2</td>

                                                    <td>
                                                        <select name="uraian2" class="form-control">
                                                            <option value="-">-</option>
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

                                                            <option value="-">-</option>
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

                                                            <option value="-">-</option>
                                                            <option value="Malam">Malam</option>
                                                            <option value="Hari">Hari</option>
                                                            <option value="Kali">Kali</option>
                                                        </select>

                                                    </td>
                                                    <td>

                                                        <input type="text" name="hargasatuan2" value=" " class="form-control" />
                                                        <small class="text-danger">Beri tanda "-" bila kolom ini tidak terisi</small>


                                                    </td>
                                                    <td>

                                                        <select name="persen2" class="form-control">

                                                            <option value="1">100%</option>
                                                            <option value="0.3">30%</option>
                                                        </select>

                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>3</td>

                                                    <td>
                                                        <select name="uraian3" class="form-control">
                                                            <option value="-">-</option>
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

                                                            <option value="-">-</option>
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

                                                            <option value="-">-</option>
                                                            <option value="Malam">Malam</option>
                                                            <option value="Hari">Hari</option>
                                                            <option value="Kali">Kali</option>
                                                        </select>

                                                    </td>
                                                    <td>

                                                        <input type="text" name="hargasatuan3" value=" " class="form-control" />
                                                        <small class="text-danger">Beri tanda "-" bila kolom ini tidak terisi</small>


                                                    </td>
                                                    <td>

                                                        <select name="persen3" class="form-control">

                                                            <option value="1">100%</option>
                                                            <option value="0.3">30%</option>
                                                        </select>

                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>4</td>

                                                    <td>
                                                        <select name="uraian4" class="form-control">
                                                            <option value="-">-</option>
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

                                                            <option value="-">-</option>
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

                                                            <option value="-">-</option>
                                                            <option value="Malam">Malam</option>
                                                            <option value="Hari">Hari</option>
                                                            <option value="Kali">Kali</option>
                                                        </select>

                                                    </td>
                                                    <td>

                                                        <input type="text" name="hargasatuan4" value=" " class="form-control" />
                                                        <small class="text-danger">Beri tanda "-" bila kolom ini tidak terisi</small>


                                                    </td>
                                                    <td>

                                                        <select name="persen4" class="form-control">

                                                            <option value="1">100%</option>
                                                            <option value="0.3">30%</option>
                                                        </select>

                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>5</td>

                                                    <td>
                                                        <select name="uraian5" class="form-control">
                                                            <option value="-">-</option>
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

                                                            <option value="-">-</option>
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

                                                            <option value="-">-</option>
                                                            <option value="Malam">Malam</option>
                                                            <option value="Hari">Hari</option>
                                                            <option value="Kali">Kali</option>
                                                        </select>

                                                    </td>
                                                    <td>

                                                        <input type="text" name="hargasatuan5" value=" " class="form-control" />
                                                        <small class="text-danger">Beri tanda "-" bila kolom ini tidak terisi</small>


                                                    </td>
                                                    <td>

                                                        <select name="persen5" class="form-control">

                                                            <option value="1">100%</option>
                                                            <option value="0.3">30%</option>
                                                        </select>

                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>6</td>

                                                    <td>
                                                        <select name="uraian6" class="form-control">
                                                            <option value="-">-</option>
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

                                                            <option value="-">-</option>
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

                                                            <option value="-">-</option>
                                                            <option value="Malam">Malam</option>
                                                            <option value="Hari">Hari</option>
                                                            <option value="Kali">Kali</option>
                                                        </select>

                                                    </td>
                                                    <td>

                                                        <input type="text" name="hargasatuan6" value=" " class="form-control" />
                                                        <small class="text-danger">Beri tanda "-" bila kolom ini tidak terisi</small>


                                                    </td>
                                                    <td>

                                                        <select name="persen6" class="form-control">

                                                            <option value="1">100%</option>
                                                            <option value="0.3">30%</option>
                                                        </select>

                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>7</td>

                                                    <td>
                                                        <select name="uraian7" class="form-control">
                                                            <option value="-">-</option>
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

                                                            <option value="-">-</option>
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

                                                            <option value="-">-</option>
                                                            <option value="Malam">Malam</option>
                                                            <option value="Hari">Hari</option>
                                                            <option value="Kali">Kali</option>
                                                        </select>

                                                    </td>
                                                    <td>

                                                        <input type="text" name="hargasatuan7" value=" " class="form-control" />
                                                        <small class="text-danger">Beri tanda "-" bila kolom ini tidak terisi</small>


                                                    </td>
                                                    <td>

                                                        <select name="persen7" class="form-control">

                                                            <option value="1">100%</option>
                                                            <option value="0.3">30%</option>
                                                        </select>

                                                    </td>

                                                </tr>
                                                <tr>
                                                <td>8</td>
                                               
                                                <td>
                                                        <select name="uraian8" class="form-control">
                                                            <option value="-">-</option>
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

                                                            <option value="-">-</option>
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

                                                            <option value="-">-</option>
                                                            <option value="Malam">Malam</option>
                                                            <option value="Hari">Hari</option>
                                                            <option value="Kali">Kali</option>
                                                        </select>
                                               
                                                </td>
                                                <td>
                                                  
                                                        <input type="text" name="hargasatuan8" value=" " class="form-control"/>
                                                        <small class="text-danger">Beri tanda "-" bila kolom ini tidak terisi</small>
                                                
                                                    
                                                </td>
                                                <td >
                                                   
                                                        <select name="persen8" class="form-control">

                                                            <option value="1">100%</option>
                                                            <option value="0.3">30%</option>
                                                        </select>
                                                    
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