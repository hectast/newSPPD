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
    $jdl = "Data Kepala Balai";
    $ttl = $jdl . " | SPPD";
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../../layout/header.php'; ?>

<?php
if (isset($_POST['simpan_data'])) {
	$namakepbalai=$_POST['namakepbalai'];
	$nipkepbalai=$_POST['nipkepbalai'];

    if (empty($namakepbalai) || empty($nipkepbalai)) {
    ?>
        <script type="text/javascript">
            alert('Form yang anda isi belum lengkap!');
            window.location.href = '<?= $url; ?>views/page/master_data/kabalai.php';
        </script>
    <?php

        return false;
    } else {
        $simpan = mysqli_query($konek, "INSERT INTO tbl_kepbalai (namakepbalai, nipkepbalai)
                                        VALUES ('$namakepbalai','$nipkepbalai')");
        if (!$simpan) {
        ?>
            <script type="text/javascript">
                alert('Data gagal ditambahkan!');
                window.location.href = '<?= $url; ?>views/page/master_data/kabalai.php';
            </script>
        <?php

            return false;
        } else {
        ?>
            <script type="text/javascript">
                alert('Data berhasil ditambahkan!');
                window.location.href = '<?= $url; ?>views/page/master_data/kabalai.php';
            </script>
<?php
        }
    }
}

if (isset($_POST['hapus_data'])) {
    $hapus = mysqli_query($konek, "DELETE FROM tbl_kepbalai WHERE id='$_POST[id]'");
    if (!$hapus) {
        ?>
        <script type="text/javascript">
            alert('Data gagal dihapus!');
            window.location.href = '<?= $url; ?>views/page/master_data/kabalai.php';
        </script>
    <?php

        return false;
    } else {
    ?>
        <script type="text/javascript">
            alert('Data berhasil dihapus!');
            window.location.href = '<?= $url; ?>views/page/master_data/kabalai.php';
        </script>
    <?php
    }
}

if (isset($_POST['simpan_perubahan_data'])) {
	$id = $_POST['id'];
	$namakepbalai=$_POST['namakepbalai'];
	$nipkepbalai=$_POST['nipkepbalai'];

    if (empty($namakepbalai) || empty($nipkepbalai)) {
    ?>
        <script type="text/javascript">
            alert('Form yang anda isi belum lengkap!');
            window.location.href = '<?= $url; ?>views/page/master_data/kabalai.php';
        </script>
        <?php

        return false;
    } else {
        $edit = mysqli_query($konek,"UPDATE tbl_kepbalai SET namakepbalai='$namakepbalai', nipkepbalai='$nipkepbalai' 
                                    WHERE id ='$id'");
        if (!$edit) {
        ?>
            <script type="text/javascript">
                alert('Data gagal diubah!');
                window.location.href = '<?= $url; ?>views/page/master_data/kabalai.php';
            </script>
        <?php

            return false;
        } else {
        ?>
            <script type="text/javascript">
                alert('Data berhasil diubah!');
                window.location.href = '<?= $url; ?>views/page/master_data/kabalai.php';
            </script>
<?php
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
                                <li class="breadcrumb-item">Master Data</li>
                                <li class="breadcrumb-item active"><?= $jdl; ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                        <i class="fas fa-plus"></i> Tambah Data
                                    </button>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="40%">Nama</th>
                                                <th width="35%">NIP</th>
                                                <th width="20%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($konek, "SELECT * FROM tbl_kepbalai ORDER BY id DESC");
                                            $no = 1;
                                            while ($d = mysqli_fetch_assoc($query)) {
                                                echo "
                                                    <tr>
                                                        <td>$no</td>
                                                        <td>$d[namakepbalai]</td>
                                                        <td>$d[nipkepbalai]</td>
                                                        <td>
                                                            <div class='btn-group'>
                                                                <button type='button' class='btn btn-xs btn-info' data-toggle='modal' data-target='#modal-edit$d[id]'>
                                                                    <i class='fas fa-edit'></i>
                                                                </button>
                                                                <button type='button' class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modal-hapus$d[id]'>
                                                                    <i class='fas fa-trash'></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                        
                                                    </tr>
                                                    ";

                                                echo "";
                                            ?>
                                                <div class="modal fade" id="modal-edit<?= $d['id']; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Form Edit Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="<?= $url; ?>views/page/master_data/kabalai.php" method="post">
                                                                <input type="hidden" name="id" value="<?= $d['id']; ?>">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input type="text" name="namakepbalai" class="form-control" value="<?= $d['namakepbalai'] ?>" placeholder="..." />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>NIP</label>
                                                                        <input type="number" name="nipkepbalai" class="form-control" value="<?= $d['nipkepbalai'] ?>" placeholder="..." />
                                                                        <small class="text-muted">* Jangan gunakan spasi pada NIP</small>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                                    <button type="submit" name="simpan_perubahan_data" class="btn btn-primary">Simpan Perubahan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->

                                                <div class="modal fade" id="modal-hapus<?= $d['id']; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content justify-content-center">
                                                            <form action="<?= $url; ?>views/page/master_data/kabalai.php" method="post">
                                                                <input type="hidden" name="id" value="<?= $d['id']; ?>">
                                                                <div class="modal-body">
                                                                    <div class="d-flex justify-content-center">
                                                                        <p>Anda yakin menghapus data ini ?</p>
                                                                    </div>
                                                                    <div class="row justify-content-around">
                                                                        <button type="button" class="btn btn-default ml-2" data-dismiss="modal">Tidak</button>
                                                                        <button type="submit" name="hapus_data" class="btn btn-danger mr-2">Yakin</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            <?php
                                                echo "";
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Form Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= $url; ?>views/page/master_data/kabalai.php" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="namakepbalai" class="form-control" placeholder="..." />
                                </div>
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="number" name="nipkepbalai" class="form-control" placeholder="..." />
                                    <small class="text-muted">* Jangan gunakan spasi pada NIP</small>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                <button type="submit" name="simpan_data" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

        </div>
        <?php include '../../layout/footer.php'; ?>
    </div>
    <?php include '../../layout/js.php'; ?>
</body>
</html>