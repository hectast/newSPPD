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
$jdl = "Rincian Biaya Perjalanan Dinas";
$ttl = $jdl . " | SPPD";
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
                        <div class="card col-12">
                            <div class="card-body">

                                <table id="example1" class="table table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No.SPD</th>
                                            <th style="min-width: 100px;">Tgl.SPD</th>
                                            <th style="min-width: 200px;">Pelaksana SPD</th>
                                            <th>NIP</th>
                                            <th>Jabatan</th>
                                            <th>Pembebanan Anggaran (akun)</th>
                                            <th style="min-width:80px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $no = 1;
                                        $result = $konek->query("SELECT * FROM tbl_spd");

                                        while ($rowdata = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>
                                                <td width><?= $no++ ?></td>
                                                <td><?= $rowdata['nospd']; ?></td>
                                                <td><?= date('d M Y', strtotime($rowdata['tglspt'])); ?></td>
                                                <td><?= $rowdata['laksanaspd']; ?></td>
                                                <td><?= $rowdata['niplaksanaspd']; ?></td>
                                                <td><?= $rowdata['jabatan'] ?></td>
                                                <td><?= $rowdata['akun'] ?></td>
                                                <td align="center">

                                                    <?php
                                                    $query = "SELECT * FROM  tbl_rinciriil where nospd = '$rowdata[nospd]'";
                                                    $opsi = mysqli_query($konek, $query);
                                                    $cek = mysqli_num_rows($opsi);

                                                    if ($cek > 0) {
                                                    ?>
                                                            <a target="_blank" href="cetak_rincian.php?id=<?= $rowdata['id'] ?>" class="btn btn-xs btn-success"><i class="fa fa-print"></i></a> <a href="edit_rincian.php?id=<?= $rowdata['id']; ?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a> <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalhapus"><i class="fa fa-trash"></i></button>

                                                    <?php
                                                    } else {
                                                    ?>
                                                    <a href="rincian.php?id=<?= $rowdata['id'] ?>" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a>
                                                 
                                                    <?php
                                                    }
                                                    ?>



                                                    <div class="modal fade" id="modalhapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content justify-content-center">
                                                                <form action="tampil_cetakrincian.php" method="post">
                                                                    <input type="hidden" name="id" value="<?= $rowdata['id']; ?>">
                                                                    <div class="modal-body">
                                                                        <div class="d-flex justify-content-center">
                                                                            <p>Anda yakin menghapus data ini ?</p>
                                                                        </div>
                                                                        <div class="row justify-content-around">
                                                                            <button type="button" class="btn btn-default ml-2" data-dismiss="modal">Tidak</button>
                                                                            <button type="submit" name="hapus_data" class="btn btn-danger mr-2">Yakin</button>
                                                                            <?php

                                                                            if (isset($_POST['hapus_data'])) {
                                                                                $idhapus = $_POST['id'];
                                                                                $hapus = $konek->query("DELETE FROM tbl_rinciriil WHERE id='$idhapus'");
                                                                                echo "
                                                                                <script>
                                                                                window.location.href='tampil_cetakrincian.php';
                                                                                </script>
                                                                                ";
                                                                            }

                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                    </div>
                            </div>
                            <!-- /.modal -->
                            </td>
                            </tr>
                        <?php } ?>


                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
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