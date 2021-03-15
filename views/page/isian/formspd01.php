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
$jdl = "Form Pelaksana SPD";
$ttl = $jdl . " | SPPD";
// error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
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
                                    <form action="" method="GET">
                                        <div class="form-group">
                                            <label>Penanggung Jawab SPD</label>
                                            <select name="namapjspd" id="" class="form-control">
                                                <option value="" hidden>-Pilih Penanggung Jawab SPD</option>
                                                <?php
                                                $sqlpjspd = mysqli_query($konek, "SELECT * FROM tbl_pjspd ORDER BY namapjspd ASC");

                                                while ($dp = mysqli_fetch_assoc($sqlpjspd)) {
                                                    echo "<option value='$dp[namapjspd]'>$dp[namapjspd]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Pelaksana SPD</label>
                                            <select name="laksanaspd" id="" class="form-control">
                                                <option value="" hidden>-Pilih Pelaksana SPD-</option>

                                                <?php
                                                $sqlpelaksana = mysqli_query($konek, "SELECT * FROM tbl_laksanaspd ORDER BY laksanaspd ASC");

                                                while ($dk = mysqli_fetch_assoc($sqlpelaksana)) {
                                                    echo "<option value='$dk[laksanaspd]'>$dk[laksanaspd]</option>";
                                                }
                                                ?>

                                            </select>
                                            <small class="text-danger">*Tambah apabila pelaksana tidak ada dalam list</small>
                                        </div>
                                        <div class="form-group">
                                            <button name="submit_tampil" class="btn btn-primary"><i class="fa fa-search"></i> Tampilkan</button>
                                            <a href="#" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pelaksana SPD</a>
                                        </div>
                                    </form>

                                    <?php
                                    if (isset($_GET['laksanaspd'])) {
                                        $sqlpelaksana = mysqli_query($konek, "SELECT * FROM tbl_laksanaspd WHERE laksanaspd='$_GET[laksanaspd]'");
                                        $dk = mysqli_fetch_array($sqlpelaksana);
                                        $laksanaspd = $dk['laksanaspd'];
                                    }
                                    ?>
                                    <?php
                                    if (isset($_GET['namapjspd'])) {
                                        $sqlpjspd = mysqli_query($konek, "SELECT * FROM tbl_pjspd WHERE namapjspd='$_GET[namapjspd]'");
                                        $dp = mysqli_fetch_array($sqlpjspd);
                                    }
                                    ?>
                                    <hr>
                                    <form action="formspd02.php" method="POST">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Tempat Berangkat</label>
                                                    <input type="text" name="berangkat" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Tempat Tujuan</label>
                                                    <input type="text" name="tujuan" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Alat Angkut</label>
                                                    <select name="angkut" id="" class="form-control">
                                                        <option value="" hidden>-Alat Angkut-</option>
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
                                                        <option value="" hidden>-Lama Perjalanan-</option>
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
                                                    <input name="tglberangkat" type="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Tanggal harus kembali/tiba di tempat baru</label>
                                                    <input name="tglkembali" type="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Pembebanan Anggaran (Akun)</label>
                                                    <input type="text" name="akun" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Tanggal SPT</label>
                                                    <input name="tglspt" type="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>NO SPT</label>
                                                    <input type="text" class="form-control" name="nospt" value="/TU.040/K.10.A/<?php echo date("m/Y"); ?>">
                                                    <small class="text-danger">*Sesuaikan Nomor dan Kodenya</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>NO SPPD</label>
                                                    <input type="text" name="nospd" class="form-control" value="/TU.040/K.10.A/<?php echo date("m/Y"); ?>">
                                                    <small class="text-danger">*Sesuaikan Nomor dan Kodenya</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label>Maksud Perjalanan</label>
                                                <textarea required class="form-control" name="maksud" cols="30" rows="10"></textarea><br>
                                            </div>
                                        </div>
                                        <!-- pj -->
                                        <input class="form-control" type="text" name="namapjspd" hidden value="<?php echo $dp['namapjspd']; ?>" />
                                        <input class="form-control" type="text" name="nippjspd" hidden value="<?php echo $dp['nippjspd']; ?>" />
                                        <input class="form-control" type="text" name="jabatanpj" hidden value="<?php echo $dp['jabatanpj']; ?>" />
                                        <!-- pelaksana -->
                                        <input class="form-control" type="text" name="laksanaspd" hidden value="<?php echo $dk['laksanaspd']; ?>" />
                                        <input class="form-control" type="text" name="niplaksanaspd" hidden value="<?php echo $dk['niplaksanaspd']; ?>" />
                                        <input class="form-control" type="text" name="jabatan" hidden value="<?php echo $dk['jabatan']; ?>" />
                                        <input class="form-control" type="text" name="pangkatgol" hidden value="<?php echo $dk['pangkatgol']; ?>" size="40" />
                                        <input class="form-control" type="text" name="tingkat" hidden value="<?php echo $dk['tingkat']; ?>" />

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
                                        <input class="form-control" type="text" name="" readonly value="<?php echo isset($dp['namapjspd']) ? $dp['namapjspd'] : '-'; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input class="form-control" type="text" name="" readonly value="<?php echo isset($dp['nippjspd']) ? $dp['nippjspd'] : '-'; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input class="form-control" type="text" name="" readonly value="<?php echo isset($dp['jabatanpj']) ? $dp['jabatanpj'] : '-'; ?>" />
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
                                        <input class="form-control" type="text" name="" readonly value="<?php echo isset($dk['laksanaspd']) ? $dk['laksanaspd'] : '-'; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input class="form-control" type="text" name="" readonly value="<?php echo isset($dk['niplaksanaspd']) ? $dk['niplaksanaspd'] : '-'; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input class="form-control" type="text" name="" readonly value="<?php echo isset($dk['jabatan']) ? $dk['jabatan'] : '-'; ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Pangkat dan Golongan</label>
                                        <input class="form-control" type="text" name="" readonly value="<?php echo isset($dk['pangkatgol']) ? $dk['pangkatgol'] : '-'; ?>" size="40" />
                                    </div>
                                    <div class="form-group">
                                        <label>Tingkat Biaya</label>
                                        <input class="form-control" type="text" name="" readonly value="<?php echo isset($dk['tingkat']) ? $dk['tingkat'] : '-'; ?>" />
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
</body>

</html>