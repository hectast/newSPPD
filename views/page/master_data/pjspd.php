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
$jdl = "Data Penanggung Jawab";
$ttl = $jdl . " | SPPD";
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../../layout/header.php'; ?>

<?php
if (isset($_POST['simpan_data'])) {
    $namapjspd = $_POST['namapjspd'];
    $nippjspd = $_POST['nippjspd'];
    $jabatanpj = $_POST['jabatanpj'];

    if (empty($namapjspd) || empty($nippjspd) || empty($jabatanpj)) {
    ?>
        <script type="text/javascript">
            alert('Form yang anda isi belum lengkap!');
            window.location.href = '<?= $url; ?>views/page/master_data/pjspd.php';
        </script>
    <?php

        return false;
    } else {
        $simpan = mysqli_query($konek, "INSERT INTO tbl_pjspd(namapjspd, nippjspd, jabatanpj)
						 VALUES ('$namapjspd','$nippjspd','$jabatanpj')");
        if (!$simpan) {
        ?>
            <script type="text/javascript">
                alert('Data gagal ditambahkan!');
                window.location.href = '<?= $url; ?>views/page/master_data/pjspd.php';
            </script>
        <?php

            return false;
        } else {
        ?>
            <script type="text/javascript">
                alert('Data berhasil ditambahkan!');
                window.location.href = '<?= $url; ?>views/page/master_data/pjspd.php';
            </script>
<?php
        }
    }
}

if (isset($_POST['hapus_data'])) {
    $hapus = mysqli_query($konek, "DELETE FROM tbl_pjspd WHERE id='$_POST[id]'");
    if (!$hapus) {
    ?>
        <script type="text/javascript">
            alert('Data gagal dihapus!');
            window.location.href = '<?= $url; ?>views/page/master_data/pjspd.php';
        </script>
    <?php

        return false;
    } else {
    ?>
        <script type="text/javascript">
            alert('Data berhasil dihapus!');
            window.location.href = '<?= $url; ?>views/page/master_data/pjspd.php';
        </script>
    <?php
    }
}

if (isset($_POST['simpan_perubahan_data'])) {
	$id = $_POST['id'];
	$namapjspd=$_POST['namapjspd'];
	$nippjspd=$_POST['nippjspd'];
	$jabatanpj=$_POST['jabatanpj']; 
	
	if(empty($namapjspd) || empty($nippjspd) || empty($jabatanpj)){
    ?>
        <script type="text/javascript">
            alert('Form yang anda isi belum lengkap!');
            window.location.href = '<?= $url; ?>views/page/master_data/pjspd.php';
        </script>
    <?php

        return false;
    }else{
		$edit=mysqli_query($konek,"UPDATE tbl_pjspd SET namapjspd='$namapjspd', nippjspd='$nippjspd', jabatanpj='$jabatanpj'  
                                    WHERE id ='$id'");
		if(!$edit){
        ?>
            <script type="text/javascript">
                alert('Data gagal diubah!');
                window.location.href = '<?= $url; ?>views/page/master_data/pjspd.php';
            </script>
        <?php

            return false;
		}else{
        ?>
            <script type="text/javascript">
                alert('Data berhasil diubah!');
                window.location.href = '<?= $url; ?>views/page/master_data/pjspd.php';
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
                                                <th width="30%">Nama</th>
                                                <th width="20%">NIP</th>
                                                <th width="25%">Jabatan</th>
                                                <th width="20%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($konek, "SELECT * FROM tbl_pjspd ORDER BY id DESC");
                                            $no = 1;
                                            while ($d = mysqli_fetch_assoc($query)) {
                                                echo "
                                                    <tr>
                                                        <td>$no</td>
                                                        <td>$d[namapjspd]</td>
                                                        <td>$d[nippjspd]</td>
                                                        <td>$d[jabatanpj]</td>
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
                                                            <form action="<?= $url; ?>views/page/master_data/pjspd.php" method="post">
                                                                <input type="hidden" name="id" value="<?= $d['id']; ?>">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input type="text" name="namapjspd" class="form-control" value="<?= $d['namapjspd'] ?>" placeholder="..." />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>NIP</label>
                                                                        <input type="number" name="nippjspd" class="form-control" value="<?= $d['nippjspd'] ?>" placeholder="..." />
                                                                        <small class="text-muted">* Jangan gunakan spasi pada NIP</small>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Jabatan</label>
                                                                        <input type="text" name="jabatanpj" class="form-control" value="<?= $d['jabatanpj'] ?>" placeholder="..." />
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
                                                            <form action="<?= $url; ?>views/page/master_data/pjspd.php" method="post">
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
                        <form action="<?= $url; ?>views/page/master_data/pjspd.php" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="namapjspd" class="form-control" placeholder="..." />
                                </div>
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="number" name="nippjspd" class="form-control" placeholder="..." />
                                    <small class="text-muted">* Jangan gunakan spasi pada NIP</small>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" name="jabatanpj" class="form-control" placeholder="..." />
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