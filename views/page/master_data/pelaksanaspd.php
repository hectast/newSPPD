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
$jdl = "Data Pelaksana Perjalanan";
$ttl = $jdl . " | SPPD";
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../../layout/header.php'; ?>

<?php
if (isset($_POST['simpan_data'])) {
    $laksanaspd = $_POST['laksanaspd'];
    $niplaksanaspd = $_POST['niplaksanaspd'];
    $pangkatgol = $_POST['pangkatgol'];
    $jabatan = $_POST['jabatan'];
    $tingkat = $_POST['tingkat'];

    if (empty($laksanaspd) || empty($niplaksanaspd) || empty($pangkatgol) || empty($jabatan) || empty($tingkat)) {
?>
        <script type="text/javascript">
            alert('Form yang anda isi belum lengkap!');
            window.location.href = '<?= $url; ?>views/page/master_data/pelaksanaspd.php';
        </script>
        <?php

        return false;
    } else {
        $simpan = mysqli_query($konek, "INSERT INTO tbl_laksanaspd(laksanaspd, niplaksanaspd, pangkatgol, jabatan, tingkat)
                                        VALUES  ('$laksanaspd','$niplaksanaspd','$pangkatgol','$jabatan','$tingkat')");
        if (!$simpan) {
        ?>
            <script type="text/javascript">
                alert('Data gagal ditambahkan!');
                window.location.href = '<?= $url; ?>views/page/master_data/pelaksanaspd.php';
            </script>
        <?php

            return false;
        } else {
        ?>
            <script type="text/javascript">
                alert('Data berhasil ditambahkan!');
                window.location.href = '<?= $url; ?>views/page/master_data/pelaksanaspd.php';
            </script>
        <?php
        }
    }
}

if (isset($_POST['hapus_data'])) {
    $hapus = mysqli_query($konek, "DELETE FROM tbl_laksanaspd WHERE id='$_POST[id]'");
    if (!$hapus) {
        ?>
        <script type="text/javascript">
            alert('Data gagal dihapus!');
            window.location.href = '<?= $url; ?>views/page/master_data/pelaksanaspd.php';
        </script>
    <?php

        return false;
    } else {
    ?>
        <script type="text/javascript">
            alert('Data berhasil dihapus!');
            window.location.href = '<?= $url; ?>views/page/master_data/pelaksanaspd.php';
        </script>
    <?php
    }
}

if (isset($_POST['simpan_perubahan_data'])) {
    $id = $_POST['id'];
    $laksanaspd = $_POST['laksanaspd'];
    $niplaksanaspd = $_POST['niplaksanaspd'];
    $pangkatgol = $_POST['pangkatgol'];
    $jabatan = $_POST['jabatan'];
    $tingkat = $_POST['tingkat'];

    if (empty($laksanaspd) || empty($niplaksanaspd) || empty($pangkatgol) || empty($jabatan) || empty($tingkat)) {
    ?>
        <script type="text/javascript">
            alert('Form yang anda isi belum lengkap!');
            window.location.href = '<?= $url; ?>views/page/master_data/pelaksanaspd.php';
        </script>
        <?php

        return false;
    } else {
        $edit = mysqli_query($konek,"UPDATE tbl_laksanaspd SET laksanaspd='$laksanaspd', niplaksanaspd='$niplaksanaspd', pangkatgol='$pangkatgol', jabatan='$jabatan',
                                    tingkat='$tingkat' WHERE id ='$id'");
        if (!$edit) {
        ?>
            <script type="text/javascript">
                alert('Data gagal diubah!');
                window.location.href = '<?= $url; ?>views/page/master_data/pelaksanaspd.php';
            </script>
        <?php

            return false;
        } else {
        ?>
            <script type="text/javascript">
                alert('Data berhasil diubah!');
                window.location.href = '<?= $url; ?>views/page/master_data/pelaksanaspd.php';
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
                                                <th>Nama</th>
                                                <th width="10%">NIP</th>
                                                <th>Pangkat/Golongan</th>
                                                <th width="15%">Jabatan</th>
                                                <th>Tingkat Biaya</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($konek, "SELECT * FROM tbl_laksanaspd ORDER BY laksanaspd ASC");
                                            $no = 1;
                                            while ($d = mysqli_fetch_assoc($query)) {
                                                echo "
                                                    <tr>
                                                        <td>$no</td>
                                                        <td>$d[laksanaspd]</td>
                                                        <td>$d[niplaksanaspd]</td>
                                                        <td>$d[pangkatgol]</td>
                                                        <td>$d[jabatan]</td>
                                                        <td>$d[tingkat]</td>
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
                                                            <form action="<?= $url; ?>views/page/master_data/pelaksanaspd.php" method="post">
                                                                <input type="hidden" name="id" value="<?= $d['id']; ?>">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input type="text" name="laksanaspd" class="form-control" value="<?= $d['laksanaspd'] ?>" placeholder="..." />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>NIP</label>
                                                                        <input type="number" name="niplaksanaspd" class="form-control" value="<?= $d['niplaksanaspd'] ?>" placeholder="..." />
                                                                        <small class="text-muted">* Jangan gunakan spasi pada NIP</small>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Pangkat/Golongan</label>
                                                                        <select class="form-control select2bs4" name="pangkatgol" style="width: 100%;">
                                                                            <?php
                                                                            if ($d['pangkatgol'] === "-") {
                                                                                echo "
                                                                                        <option value='-' selected>-</option>
                                                                                        <option value='Pembina Utama, IV/e'>Pembina Utama, IV/e</option>
                                                                                        <option value='Pembina Utama Madya, IV/d'>Pembina Utama Madya, IV/d</option>
                                                                                        <option value='Pembina Utama Muda,IV/c'>Pembina Utama Muda,IV/c</option>
                                                                                        <option value='Pembina Tingkat I,IV/b'>Pembina Tingkat I,IV/b</option>
                                                                                        <option value='Pembina, IV/a'>Pembina, IV/a</option>
                                                                                        <option value='Penata Tingkat I, III/d'>Penata Tingkat I, III/d</option>
                                                                                        <option value='Penata, III/c'>Penata, III/c</option>
                                                                                        <option value='Penata Muda TK.I, III/b'>Penata Muda TK.I, III/b</option>
                                                                                        <option value='Penata Muda, III/a'>Penata Muda, III/a</option>
                                                                                        <option value='Pengatur TK.I, II/d'>Pengatur TK.I, II/d</option>
                                                                                        <option value='Pengatur, II/c'>Pengatur, II/c</option>
                                                                                        <option value='Pengatur Muda TK.I, II/b'>Pengatur Muda TK.I, II/b</option>
                                                                                        <option value='Pengatur Muda, II/a'>Pengatur Muda, II/a</option>
                                                                                    ";
                                                                            } else if ($d['pangkatgol'] === "Pembina Utama, IV/e") {
                                                                                echo "
                                                                                        <option value='-'>-</option>
                                                                                        <option value='Pembina Utama, IV/e' selected>Pembina Utama, IV/e</option>
                                                                                        <option value='Pembina Utama Madya, IV/d'>Pembina Utama Madya, IV/d</option>
                                                                                        <option value='Pembina Utama Muda,IV/c'>Pembina Utama Muda,IV/c</option>
                                                                                        <option value='Pembina Tingkat I,IV/b'>Pembina Tingkat I,IV/b</option>
                                                                                        <option value='Pembina, IV/a'>Pembina, IV/a</option>
                                                                                        <option value='Penata Tingkat I, III/d'>Penata Tingkat I, III/d</option>
                                                                                        <option value='Penata, III/c'>Penata, III/c</option>
                                                                                        <option value='Penata Muda TK.I, III/b'>Penata Muda TK.I, III/b</option>
                                                                                        <option value='Penata Muda, III/a'>Penata Muda, III/a</option>
                                                                                        <option value='Pengatur TK.I, II/d'>Pengatur TK.I, II/d</option>
                                                                                        <option value='Pengatur, II/c'>Pengatur, II/c</option>
                                                                                        <option value='Pengatur Muda TK.I, II/b'>Pengatur Muda TK.I, II/b</option>
                                                                                        <option value='Pengatur Muda, II/a'>Pengatur Muda, II/a</option>
                                                                                    ";
                                                                            } else if ($d['pangkatgol'] === "Pembina Utama, IV/e") {
                                                                                echo "
                                                                                        <option value='-'>-</option>
                                                                                        <option value='Pembina Utama, IV/e' selected>Pembina Utama, IV/e</option>
                                                                                        <option value='Pembina Utama Madya, IV/d'>Pembina Utama Madya, IV/d</option>
                                                                                        <option value='Pembina Utama Muda,IV/c'>Pembina Utama Muda,IV/c</option>
                                                                                        <option value='Pembina Tingkat I,IV/b'>Pembina Tingkat I,IV/b</option>
                                                                                        <option value='Pembina, IV/a'>Pembina, IV/a</option>
                                                                                        <option value='Penata Tingkat I, III/d'>Penata Tingkat I, III/d</option>
                                                                                        <option value='Penata, III/c'>Penata, III/c</option>
                                                                                        <option value='Penata Muda TK.I, III/b'>Penata Muda TK.I, III/b</option>
                                                                                        <option value='Penata Muda, III/a'>Penata Muda, III/a</option>
                                                                                        <option value='Pengatur TK.I, II/d'>Pengatur TK.I, II/d</option>
                                                                                        <option value='Pengatur, II/c'>Pengatur, II/c</option>
                                                                                        <option value='Pengatur Muda TK.I, II/b'>Pengatur Muda TK.I, II/b</option>
                                                                                        <option value='Pengatur Muda, II/a'>Pengatur Muda, II/a</option>
                                                                                    ";
                                                                            } else if ($d['pangkatgol'] === "Pembina Utama Madya, IV/d") {
                                                                                echo "
                                                                                        <option value='-'>-</option>
                                                                                        <option value='Pembina Utama, IV/e'>Pembina Utama, IV/e</option>
                                                                                        <option value='Pembina Utama Madya, IV/d' selected>Pembina Utama Madya, IV/d</option>
                                                                                        <option value='Pembina Utama Muda,IV/c'>Pembina Utama Muda,IV/c</option>
                                                                                        <option value='Pembina Tingkat I,IV/b'>Pembina Tingkat I,IV/b</option>
                                                                                        <option value='Pembina, IV/a'>Pembina, IV/a</option>
                                                                                        <option value='Penata Tingkat I, III/d'>Penata Tingkat I, III/d</option>
                                                                                        <option value='Penata, III/c'>Penata, III/c</option>
                                                                                        <option value='Penata Muda TK.I, III/b'>Penata Muda TK.I, III/b</option>
                                                                                        <option value='Penata Muda, III/a'>Penata Muda, III/a</option>
                                                                                        <option value='Pengatur TK.I, II/d'>Pengatur TK.I, II/d</option>
                                                                                        <option value='Pengatur, II/c'>Pengatur, II/c</option>
                                                                                        <option value='Pengatur Muda TK.I, II/b'>Pengatur Muda TK.I, II/b</option>
                                                                                        <option value='Pengatur Muda, II/a'>Pengatur Muda, II/a</option>
                                                                                    ";
                                                                            } else if ($d['pangkatgol'] === "Pembina Utama Muda,IV/c") {
                                                                                echo "
                                                                                        <option value='-'>-</option>
                                                                                        <option value='Pembina Utama, IV/e'>Pembina Utama, IV/e</option>
                                                                                        <option value='Pembina Utama Madya, IV/d'>Pembina Utama Madya, IV/d</option>
                                                                                        <option value='Pembina Utama Muda,IV/c' selected>Pembina Utama Muda,IV/c</option>
                                                                                        <option value='Pembina Tingkat I,IV/b'>Pembina Tingkat I,IV/b</option>
                                                                                        <option value='Pembina, IV/a'>Pembina, IV/a</option>
                                                                                        <option value='Penata Tingkat I, III/d'>Penata Tingkat I, III/d</option>
                                                                                        <option value='Penata, III/c'>Penata, III/c</option>
                                                                                        <option value='Penata Muda TK.I, III/b'>Penata Muda TK.I, III/b</option>
                                                                                        <option value='Penata Muda, III/a'>Penata Muda, III/a</option>
                                                                                        <option value='Pengatur TK.I, II/d'>Pengatur TK.I, II/d</option>
                                                                                        <option value='Pengatur, II/c'>Pengatur, II/c</option>
                                                                                        <option value='Pengatur Muda TK.I, II/b'>Pengatur Muda TK.I, II/b</option>
                                                                                        <option value='Pengatur Muda, II/a'>Pengatur Muda, II/a</option>
                                                                                    ";
                                                                            } else if ($d['pangkatgol'] === "Pembina Tingkat I,IV/b") {
                                                                                echo "
                                                                                        <option value='-'>-</option>
                                                                                        <option value='Pembina Utama, IV/e'>Pembina Utama, IV/e</option>
                                                                                        <option value='Pembina Utama Madya, IV/d'>Pembina Utama Madya, IV/d</option>
                                                                                        <option value='Pembina Utama Muda,IV/c'>Pembina Utama Muda,IV/c</option>
                                                                                        <option value='Pembina Tingkat I,IV/b' selected>Pembina Tingkat I,IV/b</option>
                                                                                        <option value='Pembina, IV/a'>Pembina, IV/a</option>
                                                                                        <option value='Penata Tingkat I, III/d'>Penata Tingkat I, III/d</option>
                                                                                        <option value='Penata, III/c'>Penata, III/c</option>
                                                                                        <option value='Penata Muda TK.I, III/b'>Penata Muda TK.I, III/b</option>
                                                                                        <option value='Penata Muda, III/a'>Penata Muda, III/a</option>
                                                                                        <option value='Pengatur TK.I, II/d'>Pengatur TK.I, II/d</option>
                                                                                        <option value='Pengatur, II/c'>Pengatur, II/c</option>
                                                                                        <option value='Pengatur Muda TK.I, II/b'>Pengatur Muda TK.I, II/b</option>
                                                                                        <option value='Pengatur Muda, II/a'>Pengatur Muda, II/a</option>
                                                                                    ";
                                                                            } else if ($d['pangkatgol'] === "Pembina, IV/a") {
                                                                                echo "
                                                                                        <option value='-'>-</option>
                                                                                        <option value='Pembina Utama, IV/e'>Pembina Utama, IV/e</option>
                                                                                        <option value='Pembina Utama Madya, IV/d'>Pembina Utama Madya, IV/d</option>
                                                                                        <option value='Pembina Utama Muda,IV/c'>Pembina Utama Muda,IV/c</option>
                                                                                        <option value='Pembina Tingkat I,IV/b'>Pembina Tingkat I,IV/b</option>
                                                                                        <option value='Pembina, IV/a' selected>Pembina, IV/a</option>
                                                                                        <option value='Penata Tingkat I, III/d'>Penata Tingkat I, III/d</option>
                                                                                        <option value='Penata, III/c'>Penata, III/c</option>
                                                                                        <option value='Penata Muda TK.I, III/b'>Penata Muda TK.I, III/b</option>
                                                                                        <option value='Penata Muda, III/a'>Penata Muda, III/a</option>
                                                                                        <option value='Pengatur TK.I, II/d'>Pengatur TK.I, II/d</option>
                                                                                        <option value='Pengatur, II/c'>Pengatur, II/c</option>
                                                                                        <option value='Pengatur Muda TK.I, II/b'>Pengatur Muda TK.I, II/b</option>
                                                                                        <option value='Pengatur Muda, II/a'>Pengatur Muda, II/a</option>
                                                                                    ";
                                                                            } else if ($d['pangkatgol'] === "Penata Tingkat I, III/d") {
                                                                                echo "
                                                                                        <option value='-'>-</option>
                                                                                        <option value='Pembina Utama, IV/e'>Pembina Utama, IV/e</option>
                                                                                        <option value='Pembina Utama Madya, IV/d'>Pembina Utama Madya, IV/d</option>
                                                                                        <option value='Pembina Utama Muda,IV/c'>Pembina Utama Muda,IV/c</option>
                                                                                        <option value='Pembina Tingkat I,IV/b'>Pembina Tingkat I,IV/b</option>
                                                                                        <option value='Pembina, IV/a'>Pembina, IV/a</option>
                                                                                        <option value='Penata Tingkat I, III/d' selected>Penata Tingkat I, III/d</option>
                                                                                        <option value='Penata, III/c'>Penata, III/c</option>
                                                                                        <option value='Penata Muda TK.I, III/b'>Penata Muda TK.I, III/b</option>
                                                                                        <option value='Penata Muda, III/a'>Penata Muda, III/a</option>
                                                                                        <option value='Pengatur TK.I, II/d'>Pengatur TK.I, II/d</option>
                                                                                        <option value='Pengatur, II/c'>Pengatur, II/c</option>
                                                                                        <option value='Pengatur Muda TK.I, II/b'>Pengatur Muda TK.I, II/b</option>
                                                                                        <option value='Pengatur Muda, II/a'>Pengatur Muda, II/a</option>
                                                                                    ";
                                                                            } else if ($d['pangkatgol'] === "Penata, III/c") {
                                                                                echo "
                                                                                        <option value='-'>-</option>
                                                                                        <option value='Pembina Utama, IV/e'>Pembina Utama, IV/e</option>
                                                                                        <option value='Pembina Utama Madya, IV/d'>Pembina Utama Madya, IV/d</option>
                                                                                        <option value='Pembina Utama Muda,IV/c'>Pembina Utama Muda,IV/c</option>
                                                                                        <option value='Pembina Tingkat I,IV/b'>Pembina Tingkat I,IV/b</option>
                                                                                        <option value='Pembina, IV/a'>Pembina, IV/a</option>
                                                                                        <option value='Penata Tingkat I, III/d'>Penata Tingkat I, III/d</option>
                                                                                        <option value='Penata, III/c' selected>Penata, III/c</option>
                                                                                        <option value='Penata Muda TK.I, III/b'>Penata Muda TK.I, III/b</option>
                                                                                        <option value='Penata Muda, III/a'>Penata Muda, III/a</option>
                                                                                        <option value='Pengatur TK.I, II/d'>Pengatur TK.I, II/d</option>
                                                                                        <option value='Pengatur, II/c'>Pengatur, II/c</option>
                                                                                        <option value='Pengatur Muda TK.I, II/b'>Pengatur Muda TK.I, II/b</option>
                                                                                        <option value='Pengatur Muda, II/a'>Pengatur Muda, II/a</option>
                                                                                    ";
                                                                            } else if ($d['pangkatgol'] === "Penata Muda TK.I, III/b") {
                                                                                echo "
                                                                                        <option value='-'>-</option>
                                                                                        <option value='Pembina Utama, IV/e'>Pembina Utama, IV/e</option>
                                                                                        <option value='Pembina Utama Madya, IV/d'>Pembina Utama Madya, IV/d</option>
                                                                                        <option value='Pembina Utama Muda,IV/c'>Pembina Utama Muda,IV/c</option>
                                                                                        <option value='Pembina Tingkat I,IV/b'>Pembina Tingkat I,IV/b</option>
                                                                                        <option value='Pembina, IV/a'>Pembina, IV/a</option>
                                                                                        <option value='Penata Tingkat I, III/d'>Penata Tingkat I, III/d</option>
                                                                                        <option value='Penata, III/c'>Penata, III/c</option>
                                                                                        <option value='Penata Muda TK.I, III/b' selected>Penata Muda TK.I, III/b</option>
                                                                                        <option value='Penata Muda, III/a'>Penata Muda, III/a</option>
                                                                                        <option value='Pengatur TK.I, II/d'>Pengatur TK.I, II/d</option>
                                                                                        <option value='Pengatur, II/c'>Pengatur, II/c</option>
                                                                                        <option value='Pengatur Muda TK.I, II/b'>Pengatur Muda TK.I, II/b</option>
                                                                                        <option value='Pengatur Muda, II/a'>Pengatur Muda, II/a</option>
                                                                                    ";
                                                                            } else if ($d['pangkatgol'] === "Penata Muda, III/a") {
                                                                                echo "
                                                                                        <option value='-'>-</option>
                                                                                        <option value='Pembina Utama, IV/e'>Pembina Utama, IV/e</option>
                                                                                        <option value='Pembina Utama Madya, IV/d'>Pembina Utama Madya, IV/d</option>
                                                                                        <option value='Pembina Utama Muda,IV/c'>Pembina Utama Muda,IV/c</option>
                                                                                        <option value='Pembina Tingkat I,IV/b'>Pembina Tingkat I,IV/b</option>
                                                                                        <option value='Pembina, IV/a'>Pembina, IV/a</option>
                                                                                        <option value='Penata Tingkat I, III/d'>Penata Tingkat I, III/d</option>
                                                                                        <option value='Penata, III/c'>Penata, III/c</option>
                                                                                        <option value='Penata Muda TK.I, III/b'>Penata Muda TK.I, III/b</option>
                                                                                        <option value='Penata Muda, III/a' selected>Penata Muda, III/a</option>
                                                                                        <option value='Pengatur TK.I, II/d'>Pengatur TK.I, II/d</option>
                                                                                        <option value='Pengatur, II/c'>Pengatur, II/c</option>
                                                                                        <option value='Pengatur Muda TK.I, II/b'>Pengatur Muda TK.I, II/b</option>
                                                                                        <option value='Pengatur Muda, II/a'>Pengatur Muda, II/a</option>
                                                                                    ";
                                                                            } else if ($d['pangkatgol'] === "Pengatur TK.I, II/d") {
                                                                                echo "
                                                                                        <option value='-'>-</option>
                                                                                        <option value='Pembina Utama, IV/e'>Pembina Utama, IV/e</option>
                                                                                        <option value='Pembina Utama Madya, IV/d'>Pembina Utama Madya, IV/d</option>
                                                                                        <option value='Pembina Utama Muda,IV/c'>Pembina Utama Muda,IV/c</option>
                                                                                        <option value='Pembina Tingkat I,IV/b'>Pembina Tingkat I,IV/b</option>
                                                                                        <option value='Pembina, IV/a'>Pembina, IV/a</option>
                                                                                        <option value='Penata Tingkat I, III/d'>Penata Tingkat I, III/d</option>
                                                                                        <option value='Penata, III/c'>Penata, III/c</option>
                                                                                        <option value='Penata Muda TK.I, III/b'>Penata Muda TK.I, III/b</option>
                                                                                        <option value='Penata Muda, III/a'>Penata Muda, III/a</option>
                                                                                        <option value='Pengatur TK.I, II/d' selected>Pengatur TK.I, II/d</option>
                                                                                        <option value='Pengatur, II/c'>Pengatur, II/c</option>
                                                                                        <option value='Pengatur Muda TK.I, II/b'>Pengatur Muda TK.I, II/b</option>
                                                                                        <option value='Pengatur Muda, II/a'>Pengatur Muda, II/a</option>
                                                                                    ";
                                                                            } else if ($d['pangkatgol'] === "Pengatur, II/c") {
                                                                                echo "
                                                                                        <option value='-'>-</option>
                                                                                        <option value='Pembina Utama, IV/e'>Pembina Utama, IV/e</option>
                                                                                        <option value='Pembina Utama Madya, IV/d'>Pembina Utama Madya, IV/d</option>
                                                                                        <option value='Pembina Utama Muda,IV/c'>Pembina Utama Muda,IV/c</option>
                                                                                        <option value='Pembina Tingkat I,IV/b'>Pembina Tingkat I,IV/b</option>
                                                                                        <option value='Pembina, IV/a'>Pembina, IV/a</option>
                                                                                        <option value='Penata Tingkat I, III/d'>Penata Tingkat I, III/d</option>
                                                                                        <option value='Penata, III/c'>Penata, III/c</option>
                                                                                        <option value='Penata Muda TK.I, III/b'>Penata Muda TK.I, III/b</option>
                                                                                        <option value='Penata Muda, III/a'>Penata Muda, III/a</option>
                                                                                        <option value='Pengatur TK.I, II/d'>Pengatur TK.I, II/d</option>
                                                                                        <option value='Pengatur, II/c' selected>Pengatur, II/c</option>
                                                                                        <option value='Pengatur Muda TK.I, II/b'>Pengatur Muda TK.I, II/b</option>
                                                                                        <option value='Pengatur Muda, II/a'>Pengatur Muda, II/a</option>
                                                                                    ";
                                                                            } else if ($d['pangkatgol'] === "Pengatur Muda TK.I, II/b") {
                                                                                echo "
                                                                                        <option value='-'>-</option>
                                                                                        <option value='Pembina Utama, IV/e'>Pembina Utama, IV/e</option>
                                                                                        <option value='Pembina Utama Madya, IV/d'>Pembina Utama Madya, IV/d</option>
                                                                                        <option value='Pembina Utama Muda,IV/c'>Pembina Utama Muda,IV/c</option>
                                                                                        <option value='Pembina Tingkat I,IV/b'>Pembina Tingkat I,IV/b</option>
                                                                                        <option value='Pembina, IV/a'>Pembina, IV/a</option>
                                                                                        <option value='Penata Tingkat I, III/d'>Penata Tingkat I, III/d</option>
                                                                                        <option value='Penata, III/c'>Penata, III/c</option>
                                                                                        <option value='Penata Muda TK.I, III/b'>Penata Muda TK.I, III/b</option>
                                                                                        <option value='Penata Muda, III/a'>Penata Muda, III/a</option>
                                                                                        <option value='Pengatur TK.I, II/d'>Pengatur TK.I, II/d</option>
                                                                                        <option value='Pengatur, II/c'>Pengatur, II/c</option>
                                                                                        <option value='Pengatur Muda TK.I, II/b' selected>Pengatur Muda TK.I, II/b</option>
                                                                                        <option value='Pengatur Muda, II/a'>Pengatur Muda, II/a</option>
                                                                                    ";
                                                                            } else if ($d['pangkatgol'] === "Pengatur Muda, II/a") {
                                                                                echo "
                                                                                        <option value='-'>-</option>
                                                                                        <option value='Pembina Utama, IV/e'>Pembina Utama, IV/e</option>
                                                                                        <option value='Pembina Utama Madya, IV/d'>Pembina Utama Madya, IV/d</option>
                                                                                        <option value='Pembina Utama Muda,IV/c'>Pembina Utama Muda,IV/c</option>
                                                                                        <option value='Pembina Tingkat I,IV/b'>Pembina Tingkat I,IV/b</option>
                                                                                        <option value='Pembina, IV/a'>Pembina, IV/a</option>
                                                                                        <option value='Penata Tingkat I, III/d'>Penata Tingkat I, III/d</option>
                                                                                        <option value='Penata, III/c'>Penata, III/c</option>
                                                                                        <option value='Penata Muda TK.I, III/b'>Penata Muda TK.I, III/b</option>
                                                                                        <option value='Penata Muda, III/a'>Penata Muda, III/a</option>
                                                                                        <option value='Pengatur TK.I, II/d'>Pengatur TK.I, II/d</option>
                                                                                        <option value='Pengatur, II/c'>Pengatur, II/c</option>
                                                                                        <option value='Pengatur Muda TK.I, II/b'>Pengatur Muda TK.I, II/b</option>
                                                                                        <option value='Pengatur Muda, II/a' selected>Pengatur Muda, II/a</option>
                                                                                    ";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Jabatan</label>
                                                                        <input type="text" name="jabatan" class="form-control" value="<?= $d['jabatan'] ?>" placeholder="..." />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tingkat Biaya</label>
                                                                        <select class="form-control" name="tingkat">
                                                                            <?php
                                                                            if ($d['tingkat'] === "-") {
                                                                                echo "
                                                                                    <option value='-' selected>-</option>
                                                                                    <option value='B'>B</option>
                                                                                    <option value='C'>C</option>
                                                                                    <option value='D'>D</option>
                                                                                ";
                                                                            } else if ($d['tingkat'] === "B") {
                                                                                echo "
                                                                                    <option value='-'>-</option>
                                                                                    <option value='B' selected>B</option>
                                                                                    <option value='C'>C</option>
                                                                                    <option value='D'>D</option>
                                                                                ";
                                                                            } else if ($d['tingkat'] === "C") {
                                                                                echo "
                                                                                    <option value='-'>-</option>
                                                                                    <option value='B'>B</option>
                                                                                    <option value='C' selected>C</option>
                                                                                    <option value='D'>D</option>
                                                                                ";
                                                                            } else if ($d['tingkat'] === "D") {
                                                                                echo "
                                                                                    <option value='-'>-</option>
                                                                                    <option value='B'>B</option>
                                                                                    <option value='C'>C</option>
                                                                                    <option value='D' selected>D</option>
                                                                                ";
                                                                            }
                                                                            ?>
                                                                        </select>
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
                                                            <form action="<?= $url; ?>views/page/master_data/pelaksanaspd.php" method="post">
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
                        <form action="<?= $url; ?>views/page/master_data/pelaksanaspd.php" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="laksanaspd" class="form-control" placeholder="..." />
                                </div>
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="number" name="niplaksanaspd" class="form-control" placeholder="..." />
                                    <small class="text-muted">* Jangan gunakan spasi pada NIP</small>
                                </div>
                                <div class="form-group">
                                    <label>Pangkat/Golongan</label>
                                    <select class="form-control select2bs4" name="pangkatgol" style="width: 100%;">
                                        <option value="" selected>--Pilih Pangkat/Golongan--</option>
                                        <option value="-">-</option>
                                        <option value="Pembina Utama, IV/e">Pembina Utama, IV/e</option>
                                        <option value="Pembina Utama Madya, IV/d">Pembina Utama Madya, IV/d</option>
                                        <option value="Pembina Utama Muda,IV/c">Pembina Utama Muda,IV/c</option>
                                        <option value="Pembina Tingkat I,IV/b">Pembina Tingkat I,IV/b</option>
                                        <option value="Pembina, IV/a">Pembina, IV/a</option>
                                        <option value="Penata Tingkat I, III/d">Penata Tingkat I, III/d</option>
                                        <option value="Penata, III/c">Penata, III/c</option>
                                        <option value="Penata Muda TK.I, III/b">Penata Muda TK.I, III/b</option>
                                        <option value="Penata Muda, III/a">Penata Muda, III/a</option>
                                        <option value="Pengatur TK.I, II/d">Pengatur TK.I, II/d</option>
                                        <option value="Pengatur, II/c">Pengatur, II/c</option>
                                        <option value="Pengatur Muda TK.I, II/b">Pengatur Muda TK.I, II/b</option>
                                        <option value="Pengatur Muda, II/a">Pengatur Muda, II/a</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" placeholder="..." />
                                </div>
                                <div class="form-group">
                                    <label>Tingkat Biaya</label>
                                    <select class="form-control" name="tingkat" />
                                    <option value="" selected>-Pilih Tingkat Biaya-</option>
                                    <option value="-">-</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    </select>
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