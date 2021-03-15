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
$jdl = "Form Update Pengeluaran Riil";
$ttl = $jdl . " | SPPD";
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
                                <li class="breadcrumb-item"><a href="<?= $url; ?>views/page/isian/riil.php">Daftar Pengeluaran Riil</a></li>
                                <li class="breadcrumb-item active"><?= $jdl; ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <?php
                    if (!isset($_GET['id'])) {
                    ?>
                        <script>
                            alert('Anda tidak punya hak akses ke halaman ini!');
                            window.location.href = '<?= $url; ?>views/page/isian/riil.php';
                        </script>
                    <?php
                        return false;
                    } else if (isset($_GET['id'])) {
                        $sqlnospd = mysqli_query($konek, "SELECT * FROM tbl_riil WHERE id='$_GET[id]'");

                        $d = mysqli_fetch_array($sqlnospd);
                    ?>
                    <form action="<?= $url; ?>views/page/isian/riil.php" method="post">
                        <input type="hidden" name ="id" value="<?php echo $d['id'];?>"/>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="example2" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="20%">Nama</th>
                                                    <th width="20%">NIP</th>
                                                    <th width="20%">Jabatan</th>
                                                    <th width="20%">Tanggal SPD</th>
                                                    <th width="20%">Nomor SPD</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control" name="laksanaspd" value="<?php echo $d['laksanaspd']; ?>" readonly></td>
                                                    <td><input type="text" class="form-control" name="niplaksanaspd" value="<?php echo $d['niplaksanaspd']; ?>" readonly></td>
                                                    <td><input type="text" class="form-control" name="jabatan" value="<?php echo $d['jabatan']; ?>" readonly></td>
                                                    <td><input type="text" class="form-control" name="tglspd" value="<?php echo $d['tglspd']; ?>" readonly></td>
                                                    <td><input type="text" class="form-control" name="nospd" value="<?php echo $d['nospd']; ?>" readonly></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="example3" class="table table-bordered table-striped table-responsive">
                                            <thead>
                                                <tr>
                                                    <th width="3%">No</th>
                                                    <th width="20%">Uraian</th>
                                                    <th width="3%">Banyaknya</th>
                                                    <th width="6%">Satuan</th>
                                                    <th width="16%">Harga Satuan (Rp)</th>
                                                    <th width="16%">Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" class="form-control" value="1." readonly></td>
                                                    <td><input type="text" class="form-control" name="uraian1" value="<?php echo $d['uraian1']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="banyak1" value="<?php echo $d['banyak1']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="satuan1" value="<?php echo $d['satuan1']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="hargasatuan1" value="<?php echo $d['hargasatuan1']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="jumlah1" value="<?php echo $d['jumlah1']; ?>" ></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" value="2." readonly></td>
                                                    <td><input type="text" class="form-control" name="uraian2" value="<?php echo $d['uraian2']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="banyak2" value="<?php echo $d['banyak2']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="satuan2" value="<?php echo $d['satuan2']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="hargasatuan2" value="<?php echo $d['hargasatuan2']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="jumlah2" value="<?php echo $d['jumlah2']; ?>" ></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" value="3." readonly></td>
                                                    <td><input type="text" class="form-control" name="uraian3" value="<?php echo $d['uraian3']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="banyak3" value="<?php echo $d['banyak3']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="satuan3" value="<?php echo $d['satuan3']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="hargasatuan3" value="<?php echo $d['hargasatuan3']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="jumlah3" value="<?php echo $d['jumlah3']; ?>" ></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" value="4." readonly></td>
                                                    <td><input type="text" class="form-control" name="uraian4" value="<?php echo $d['uraian4']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="banyak4" value="<?php echo $d['banyak4']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="satuan4" value="<?php echo $d['satuan4']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="hargasatuan4" value="<?php echo $d['hargasatuan4']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="jumlah4" value="<?php echo $d['jumlah4']; ?>" ></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" value="5." readonly></td>
                                                    <td><input type="text" class="form-control" name="uraian5" value="<?php echo $d['uraian5']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="banyak5" value="<?php echo $d['banyak5']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="satuan5" value="<?php echo $d['satuan5']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="hargasatuan5" value="<?php echo $d['hargasatuan5']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="jumlah5" value="<?php echo $d['jumlah5']; ?>" ></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" value="6." readonly></td>
                                                    <td><input type="text" class="form-control" name="uraian6" value="<?php echo $d['uraian6']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="banyak6" value="<?php echo $d['banyak6']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="satuan6" value="<?php echo $d['satuan6']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="hargasatuan6" value="<?php echo $d['hargasatuan6']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="jumlah6" value="<?php echo $d['jumlah6']; ?>" ></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" value="7." readonly></td>
                                                    <td><input type="text" class="form-control" name="uraian7" value="<?php echo $d['uraian7']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="banyak7" value="<?php echo $d['banyak7']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="satuan7" value="<?php echo $d['satuan7']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="hargasatuan7" value="<?php echo $d['hargasatuan7']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="jumlah7" value="<?php echo $d['jumlah7']; ?>" ></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" value="8." readonly></td>
                                                    <td><input type="text" class="form-control" name="uraian8" value="<?php echo $d['uraian8']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="banyak8" value="<?php echo $d['banyak8']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="satuan8" value="<?php echo $d['satuan8']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="hargasatuan8" value="<?php echo $d['hargasatuan8']; ?>" ></td>
                                                    <td><input type="text" class="form-control" name="jumlah8" value="<?php echo $d['jumlah8']; ?>" ></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="simpan_perubahan_data" class="btn btn-success float-right">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    }
                    ?>
                </div>
            </section>

        </div>
        <?php include '../../layout/footer.php'; ?>
    </div>
    <?php include '../../layout/js.php'; ?>
</body>

</html>