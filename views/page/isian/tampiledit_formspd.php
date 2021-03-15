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
$jdl = "Form Edit Pelaksana SPD";
$ttl = $jdl . " | SPPD";
$id_spd = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<?php
$data = $konek->query("SELECT * FROM tbl_spd WHERE id = '$id_spd'");
$qdata = mysqli_fetch_assoc($data);
?>

<?php include '../../layout/header.php'; ?>


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
                                <li class="breadcrumb-item">Isian</li>
                                <li class="breadcrumb-item">SPD</li>
                                <li class="breadcrumb-item active"><?= $jdl; ?></li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Penanggung Jawab SPD</label>
                                        <select name="namapjspd" id="" class="form-control" onchange="changeValue(this.value)">
                                            <option value="<?= $qdata['namapjspd'] ?>" hidden><?= $qdata['namapjspd']; ?></option>
                                            <?php
                                            $sqlpjspd = mysqli_query($konek, "SELECT * FROM tbl_pjspd ORDER BY namapjspd ASC");

                                            while ($dp = mysqli_fetch_array($sqlpjspd)) {
                                                echo "<option value='$dp[namapjspd]'>$dp[namapjspd]</option>";
                                            }
                                            ?>
                                            <?php 
                                                $datapsd = $konek->query("SELECT * FROM tbl_pjspd");
                                                $array = "var pjx = new Array();\n";

                                                while($qdataspd = mysqli_fetch_array($datapsd)){
                                                    $array .= "pjx['" .$qdataspd['namapjspd']."'] = {namapjspd:'".addslashes($qdataspd['namapjspd'])."',nippjspd:'".addslashes($qdataspd['nippjspd'])."',jabatanpj:'".addslashes($qdataspd['jabatanpj'])."'};\n";
                                                }
                                               

                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Pelaksana SPD</label>
                                        <select name="laksanaspd" id="" class="form-control" onchange="gantiValue(this.value)">
                                            <option value="<?= $qdata['laksanaspd'] ?>" hidden><?= $qdata['laksanaspd'] ?></option>

                                            <?php
                                            $sqlpelaksana = mysqli_query($konek, "SELECT * FROM tbl_laksanaspd ORDER BY laksanaspd ASC");

                                            while ($dk = mysqli_fetch_array($sqlpelaksana)) {
                                                echo "<option value='$dk[laksanaspd]'>$dk[laksanaspd]</option>";
                                            }
                                            ?>
                                             <?php
                                                $datalaksana = $konek->query("SELECT * FROM tbl_laksanaspd");
                                                $arraya = "var laksanax = new Array();\n";
                                                while($qlaksana = mysqli_fetch_array($datalaksana)){
                                                    $arraya .= "laksanax['".$qlaksana['laksanaspd']."'] = {laksanaspd:'".addslashes($qlaksana['laksanaspd'])."',niplaksanaspd:'".addslashes($qlaksana['niplaksanaspd'])."',pangkatgol:'".addslashes($qlaksana['pangkatgol'])."',jabatan:'".addslashes($qlaksana['jabatan'])."',tingkat:'".addslashes($qlaksana['tingkat'])."'};\n";
                                                }
                                             ?>

                                        </select>
                                        <small class="text-danger">*Tambah apabila pelaksana tidak ada dalam list</small>
                                    </div>
                                    
                                    <div class="form-group">
                                        <a href="#" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pelaksana SPD</a>
                                    </div>
                                                
                                    <hr>
                                    <form action="editspd.php" method="POST">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Tempat Berangkat</label>
                                                    <input type="text" value="<?= $qdata['id']?>" name="id" hidden>
                                                    <input type="text" value="<?= $qdata['berangkat'] ?>" name="berangkat" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Tempat Tujuan</label>
                                                    <input type="text" value="<?= $qdata['tujuan'] ?>" name="tujuan" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Alat Angkut</label>
                                                    <select name="angkut" id="" class="form-control">
                                                        <option value="<?= $qdata['angkut'] ?>" hidden><?= $qdata['angkut'] ?></option>
                                                        <option value="Pesawat dan Kendaraan Umum Lainnya">Pesawat dan Kendaraan Umum</option>
                                                        <option value="Kendaraan Umum">Kendaraan Umum</option>
                                                        <option value="Kendaraan Dinas">Kendaraan Dinas</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Lama Perjalanan</label>
                                                    <select name="lama" id="" class="form-control">
                                                        <option value="<?= $qdata['lama'] ?>" hidden><?= $qdata['lama'] ?></option>
                                                        <option value="1 (satu) hari">1 (satu) hari</option>
                                                        <option value="2 (dua) hari">2 (dua)hari</option>
                                                        <option value="3 (tiga) hari">3 (tiga) hari</option>
                                                        <option value="4 (empat) hari">4 (empat) hari</option>
                                                        <option value="5 (lima) hari">5 (lima) hari</option>
                                                        <option value="6 (enam) hari">6 (enam) hari</option>
                                                        <option value="7 (tujuh) hari">7 (tujuh) hari</option>
                                                        <option value="8 (delapan) hari">8 (delapan) hari</option>
                                                        <option value="9 (sembilan) hari">9 (sembilan) hari</option>
                                                        <option value="10 (sepuluh) hari">10 (sepuluh) hari</option>
                                                        <option value="11 (sebelas) hari">11 (sebelas) hari</option>
                                                        <option value="12 (duabelas) hari">12 (duabelas) hari</option>
                                                        <option value="13 (tigabelas) hari">13 (tigabelas) hari</option>
                                                        <option value="14 (empatbelas) hari">14 (empatbelas) hari</option>
                                                        <option value="15 (limabelas) hari">15 (limabelas) hari</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Tanggal Berangkat</label>
                                                    <input name="tglberangkat" value="<?= $qdata['tglberangkat'] ?>" type="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Tanggal harus kembali/tiba di tempat baru</label>
                                                    <input name="tglkembali" value="<?= $qdata['tglkembali'] ?>" type="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Pembebanan Anggaran (Akun)</label>
                                                    <input type="text" name="akun" value="<?= $qdata['akun'] ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Tanggal SPT</label>
                                                    <input name="tglspt" value="<?= $qdata['tglspt'] ?>" type="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>NO SPT</label>
                                                    <input type="text" class="form-control" name="nospt" value="<?= $qdata['nospt']; ?>">
                                                    <small class="text-danger">*Sesuaikan Nomor dan Kodenya</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>NO SPPD</label>
                                                    <input type="text" name="nospd" class="form-control" value="<?= $qdata['nospd']?>">
                                                    <small class="text-danger">*Sesuaikan Nomor dan Kodenya</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label>Maksud Perjalanan</label>
                                                <textarea required class="form-control" name="maksud" cols="30" rows="10"><?= $qdata['maksud'] ?></textarea><br>
                                            </div>
                                        </div>
                                        <!-- pj -->
                                        <input class="form-control" type="text" id="namapjdb" name="namapjspd"  hidden value="<?php echo $qdata['namapjspd']; ?>" />
                                        <input class="form-control" type="text" id="nippjdb" name="nippjspd" hidden  value="<?php echo $qdata['nippjspd']; ?>" />
                                        <input class="form-control" type="text" id="jabatanpjdb" name="jabatanpj" hidden  value="<?php echo $qdata['jabatanpj']; ?>" />
                                        <!-- pelaksana --><br>
                                        <input class="form-control" id="laksanadb" type="text" name="laksanaspd" hidden  value="<?php echo $qdata['laksanaspd']; ?>" />
                                        <input class="form-control" id="niplaksanadb" type="text" name="niplaksanaspd" hidden  value="<?php echo $qdata['niplaksanaspd']; ?>" />
                                        <input class="form-control" id="jabatanlaksanadb" type="text" name="jabatan" hidden  value="<?php echo $qdata['jabatan']; ?>" />
                                        <input class="form-control" id="pangkatgoldb" type="text" name="pangkatgol" hidden  value="<?php echo $qdata['pangkatgol']; ?>" size="40" />
                                        <input class="form-control" id="tingkatdb" type="text" name="tingkat" hidden  value="<?php echo $qdata['tingkat']; ?>" />

                                        <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                        <a href="tampil_cetakspd.php" class="btn btn-success"> <i class="fa fa-arrow-left"></i> Kembali</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    <b>Data Penanggung Jawab SPD</b>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control" id="namapj" type="text" name="" value="<?= $qdata['namapjspd'] ?>" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input class="form-control" id="nippjspd" type="text" name="" readonly value="<?php echo $qdata['nippjspd']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input class="form-control" id="jabatanpj" type="text" name="" readonly value="<?php echo $qdata['jabatanpj']; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <b>Data Pelaksana SPD</b>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control" id="laksanaspd" type="text" name="namapjspd" value="<?= $qdata['laksanaspd'] ?>" readonly  />
                                    </div>
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input class="form-control" id="niplaksanaspd" type="text" name="" readonly value="<?php echo $qdata['niplaksanaspd']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input class="form-control" id="jabatanlaksana" type="text" name="" readonly value="<?php echo $qdata['jabatan']; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Pangkat dan Golongan</label>
                                        <input class="form-control" type="text" id="pangkatgollaksana" name="" readonly value="<?php echo $qdata['pangkatgol']; ?>" size="40" />
                                    </div>
                                    <div class="form-group">
                                        <label>Tingkat Biaya</label>
                                        <input class="form-control" id="tingkat" type="text" name="" readonly value="<?php echo $qdata['tingkat']; ?>" />
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                </div>
            </section>

        </div>
        <?php include '../../layout/footer.php'; ?>
    </div>
    <?php include '../../layout/js.php'; ?>
    <script type="text/javascript">
        <?php echo $array;?>
        function changeValue(id){
            document.getElementById('namapj').value = pjx[id].namapjspd;
            document.getElementById('nippjspd').value = pjx[id].nippjspd;
            document.getElementById('jabatanpj').value = pjx[id].jabatanpj;

            document.getElementById('namapjdb').value = document.getElementById('namapj').value;
            document.getElementById('nippjdb').value  = document.getElementById('nippjspd').value;
            document.getElementById('jabatanpjdb').value = document.getElementById('jabatanpj').value;
        }
    </script>
    <script type="text/javascript">
    <?= $arraya;?>
    function gantiValue(id){
        document.getElementById('laksanaspd').value = laksanax[id].laksanaspd;
        document.getElementById('niplaksanaspd').value = laksanax[id].niplaksanaspd;
        document.getElementById('jabatanlaksana').value = laksanax[id].jabatan;
        document.getElementById('pangkatgollaksana').value = laksanax[id].pangkatgol;
        document.getElementById('tingkat').value = laksanax[id].tingkat;

        document.getElementById('laksanadb').value = document.getElementById('laksanaspd').value;
        document.getElementById('niplaksanadb').value = document.getElementById('niplaksanaspd').value;
        document.getElementById('jabatanlaksanadb').value = document.getElementById('jabatanlaksana').value;
        document.getElementById('pangkatgoldb').value = document.getElementById('pangkatgollaksana').value;
        document.getElementById('tingkatdb').value = document.getElementById('tingkat').value;
    }
    </script>
    <script>

    </script>

</body>

</html>