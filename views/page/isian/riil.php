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
    $jdl = "Daftar Pengeluaran Riil";
    $ttl = $jdl . " | SPPD";
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../../layout/header.php'; ?>

<?php
if (isset($_POST['simpan_data'])) {
	$laksanaspd=$_POST['laksanaspd']; $niplaksanaspd=$_POST['niplaksanaspd']; $jabatan=$_POST['jabatan'];$tglspd=$_POST['tglspd'];$nospd=$_POST['nospd'];
	$uraian1=$_POST['uraian1'];$banyak1=$_POST['banyak1']; $satuan1=$_POST['satuan1']; $hargasatuan1=$_POST['hargasatuan1'];$jumlah1=$_POST['jumlah1'];  
	$uraian2=$_POST['uraian2'];$banyak2=$_POST['banyak2']; $satuan2=$_POST['satuan2']; $hargasatuan2=$_POST['hargasatuan2'];$jumlah2=$_POST['jumlah2'];
	$uraian3=$_POST['uraian3'];$banyak3=$_POST['banyak3']; $satuan3=$_POST['satuan3']; $hargasatuan3=$_POST['hargasatuan3'];$jumlah3=$_POST['jumlah3'];
	$uraian4=$_POST['uraian4'];$banyak4=$_POST['banyak4']; $satuan4=$_POST['satuan4']; $hargasatuan4=$_POST['hargasatuan4'];$jumlah4=$_POST['jumlah4'];
	$uraian5=$_POST['uraian5'];$banyak5=$_POST['banyak5']; $satuan5=$_POST['satuan5']; $hargasatuan5=$_POST['hargasatuan5'];$jumlah5=$_POST['jumlah5'];
	$uraian6=$_POST['uraian6'];$banyak6=$_POST['banyak6']; $satuan6=$_POST['satuan6']; $hargasatuan6=$_POST['hargasatuan6'];$jumlah6=$_POST['jumlah6'];
	$uraian7=$_POST['uraian7'];$banyak7=$_POST['banyak7']; $satuan7=$_POST['satuan7']; $hargasatuan7=$_POST['hargasatuan7'];$jumlah7=$_POST['jumlah7'];
	$uraian8=$_POST['uraian8'];$banyak8=$_POST['banyak8']; $satuan8=$_POST['satuan8']; $hargasatuan8=$_POST['hargasatuan8'];$jumlah8=$_POST['jumlah8'];
	$total=$jumlah1+$jumlah2+$jumlah3+$jumlah4+$jumlah5+$jumlah6+$jumlah7+$jumlah8;

    if ($laksanaspd=='' ||$niplaksanaspd=='' ||$jabatan=='' || $tglspd=='' ||$nospd=='' || 
	$uraian1=='' || $banyak1==''||$satuan1==''||$hargasatuan1=='' ||$jumlah1=='' || 
	$uraian2=='' || $banyak2==''||$satuan2==''||$hargasatuan2=='' ||$jumlah2=='' ||  
	$uraian3=='' || $banyak3==''||$satuan3==''||$hargasatuan3=='' ||$jumlah3=='' || 
	$uraian4=='' || $banyak4==''||$satuan4==''||$hargasatuan4=='' ||$jumlah4=='' || 
	$uraian5=='' || $banyak5==''||$satuan5==''||$hargasatuan5=='' ||$jumlah5=='' || 
	$uraian6=='' || $banyak6==''||$satuan6==''||$hargasatuan6=='' ||$jumlah6=='' || 
	$uraian7=='' || $banyak7==''||$satuan7==''||$hargasatuan7=='' ||$jumlah7=='' || 
	$uraian8=='' || $banyak8==''||$satuan8==''||$hargasatuan8=='' ||$jumlah8=='') {
    ?>
        <script type="text/javascript">
            alert('Form yang anda isi belum lengkap!');
            window.location.href = '<?= $url; ?>views/page/isian/riil.php';
        </script>
    <?php

        return false;
    } else {
        $simpan = mysqli_query($konek, "INSERT INTO tbl_riil (laksanaspd,niplaksanaspd,jabatan,tglspd,nospd,
                                        uraian1, banyak1,satuan1,hargasatuan1,jumlah1,  
                                        uraian2, banyak2,satuan2,hargasatuan2,jumlah2,
                                        uraian3, banyak3,satuan3,hargasatuan3,jumlah3, 
                                        uraian4, banyak4,satuan4,hargasatuan4,jumlah4,
                                        uraian5, banyak5,satuan5,hargasatuan5,jumlah5, 
                                        uraian6, banyak6,satuan6,hargasatuan6,jumlah6, 
                                        uraian7, banyak7,satuan7,hargasatuan7,jumlah7,
                                        uraian8, banyak8,satuan8,hargasatuan8,jumlah8,total)
                                        VALUES ('$laksanaspd','$niplaksanaspd','$jabatan', '$tglspd','$nospd',
                                        '$uraian1','$banyak1','$satuan1','$hargasatuan1','$jumlah1',
                                        '$uraian2','$banyak2','$satuan2','$hargasatuan2','$jumlah2', 
                                        '$uraian3','$banyak3','$satuan3','$hargasatuan3','$jumlah3',		
                                        '$uraian4','$banyak4','$satuan4','$hargasatuan4','$jumlah4',	 
                                        '$uraian5','$banyak5','$satuan5','$hargasatuan5','$jumlah5',
                                        '$uraian6','$banyak6','$satuan6','$hargasatuan6','$jumlah6', 
                                        '$uraian7','$banyak7','$satuan7','$hargasatuan7','$jumlah7',		
                                        '$uraian8','$banyak8','$satuan8','$hargasatuan8','$jumlah8','$total')");
        if (!$simpan) {
        ?>
            <script type="text/javascript">
                alert('Data gagal ditambahkan!');
                window.location.href = '<?= $url; ?>views/page/isian/riil.php';
            </script>
        <?php

            return false;
        } else {
        ?>
            <script type="text/javascript">
                alert('Data berhasil ditambahkan!');
                window.location.href = '<?= $url; ?>views/page/isian/riil.php';
            </script>
<?php
        }
    }
}

if (isset($_POST['hapus_data'])) {
    $hapus = mysqli_query($konek, "DELETE FROM tbl_riil WHERE id='$_POST[id]'");
    if (!$hapus) {
        ?>
        <script type="text/javascript">
            alert('Data gagal dihapus!');
            window.location.href = '<?= $url; ?>views/page/isian/riil.php';
        </script>
    <?php

        return false;
    } else {
    ?>
        <script type="text/javascript">
            alert('Data berhasil dihapus!');
            window.location.href = '<?= $url; ?>views/page/isian/riil.php';
        </script>
    <?php
    }
}

if (isset($_POST['simpan_perubahan_data'])) {
    $id = $_POST['id']; 
	$laksanaspd=$_POST['laksanaspd']; $niplaksanaspd=$_POST['niplaksanaspd']; $jabatan=$_POST['jabatan'];$tglspd=$_POST['tglspd']; $nospd=$_POST['nospd'];
	$uraian1=$_POST['uraian1'];$banyak1=$_POST['banyak1']; $satuan1=$_POST['satuan1']; $hargasatuan1=$_POST['hargasatuan1'];$jumlah1=$_POST['jumlah1'];  
	$uraian2=$_POST['uraian2'];$banyak2=$_POST['banyak2']; $satuan2=$_POST['satuan2']; $hargasatuan2=$_POST['hargasatuan2'];$jumlah2=$_POST['jumlah2'];
	$uraian3=$_POST['uraian3'];$banyak3=$_POST['banyak3']; $satuan3=$_POST['satuan3']; $hargasatuan3=$_POST['hargasatuan3'];$jumlah3=$_POST['jumlah3'];
	$uraian4=$_POST['uraian4'];$banyak4=$_POST['banyak4']; $satuan4=$_POST['satuan4']; $hargasatuan4=$_POST['hargasatuan4'];$jumlah4=$_POST['jumlah4'];
	$uraian5=$_POST['uraian5'];$banyak5=$_POST['banyak5']; $satuan5=$_POST['satuan5']; $hargasatuan5=$_POST['hargasatuan5'];$jumlah5=$_POST['jumlah5'];
	$uraian6=$_POST['uraian6'];$banyak6=$_POST['banyak6']; $satuan6=$_POST['satuan6']; $hargasatuan6=$_POST['hargasatuan6'];$jumlah6=$_POST['jumlah6'];
	$uraian7=$_POST['uraian7'];$banyak7=$_POST['banyak7']; $satuan7=$_POST['satuan7']; $hargasatuan7=$_POST['hargasatuan7'];$jumlah7=$_POST['jumlah7'];
	$uraian8=$_POST['uraian8'];$banyak8=$_POST['banyak8']; $satuan8=$_POST['satuan8']; $hargasatuan8=$_POST['hargasatuan8'];$jumlah8=$_POST['jumlah8'];
	$total=$jumlah1+$jumlah2+$jumlah3+$jumlah4+$jumlah5+$jumlah6+$jumlah7+$jumlah8;

    if ($laksanaspd=='' ||$niplaksanaspd=='' ||$jabatan=='' || $tglspd=='' ||$nospd=='' || 
	$uraian1=='' || $banyak1==''||$satuan1==''||$hargasatuan1=='' ||$jumlah1=='' || 
	$uraian2=='' || $banyak2==''||$satuan2==''||$hargasatuan2=='' ||$jumlah2=='' ||  
	$uraian3=='' || $banyak3==''||$satuan3==''||$hargasatuan3=='' ||$jumlah3=='' || 
	$uraian4=='' || $banyak4==''||$satuan4==''||$hargasatuan4=='' ||$jumlah4=='' || 
	$uraian5=='' || $banyak5==''||$satuan5==''||$hargasatuan5=='' ||$jumlah5=='' || 
	$uraian6=='' || $banyak6==''||$satuan6==''||$hargasatuan6=='' ||$jumlah6=='' || 
	$uraian7=='' || $banyak7==''||$satuan7==''||$hargasatuan7=='' ||$jumlah7=='' || 
	$uraian8=='' || $banyak8==''||$satuan8==''||$hargasatuan8=='' ||$jumlah8=='') {
    ?>
        <script type="text/javascript">
            alert('Form yang anda isi belum lengkap!');
            window.location.href = '<?= $url; ?>views/page/isian/riil.php';
        </script>
        <?php

        return false;
    } else {
        $edit = mysqli_query($konek,"UPDATE tbl_riil SET laksanaspd='$laksanaspd',niplaksanaspd='$niplaksanaspd',jabatan='$jabatan',tglspd='$tglspd',nospd='$nospd',  
        uraian1='$uraian1', banyak1='$banyak1',satuan1='$satuan1',hargasatuan1='$hargasatuan1',jumlah1='$jumlah1',  
        uraian2='$uraian2', banyak2='$banyak2',satuan2='$satuan2',hargasatuan2='$hargasatuan2',jumlah2='$jumlah2',
        uraian3='$uraian3', banyak3='$banyak3',satuan3='$satuan3',hargasatuan3='$hargasatuan3',jumlah3='$jumlah3', 
        uraian4='$uraian4', banyak4='$banyak4',satuan4='$satuan4',hargasatuan4='$hargasatuan4',jumlah4='$jumlah4',
        uraian5='$uraian5', banyak5='$banyak5',satuan5='$satuan5',hargasatuan5='$hargasatuan5',jumlah5='$jumlah5', 
        uraian6='$uraian6', banyak6='$banyak6',satuan6='$satuan6',hargasatuan6='$hargasatuan6',jumlah6='$jumlah6', 
        uraian7='$uraian7', banyak7='$banyak7',satuan7='$satuan7',hargasatuan7='$hargasatuan7',jumlah7='$jumlah7',
        uraian8='$uraian8', banyak8='$banyak8',satuan8='$satuan8',hargasatuan8='$hargasatuan8',jumlah8='$jumlah8',
        total='$total' WHERE id ='$id'");
        if (!$edit) {
        ?>
            <script type="text/javascript">
                alert('Data gagal diubah!');
                window.location.href = '<?= $url; ?>views/page/isian/riil.php';
            </script>
        <?php

            return false;
        } else {
        ?>
            <script type="text/javascript">
                alert('Data berhasil diubah!');
                window.location.href = '<?= $url; ?>views/page/isian/riil.php';
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
                                <li class="breadcrumb-item">Isian</li>
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
                                    <a href="<?= $url; ?>views/page/isian/form_riil.php" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="18%">No.SPD</th>
                                                <th width="17%">Tanggal SPD</th>
                                                <th width="25%">Pelaksana SPD</th>
                                                <th width="15%">NIP</th>
                                                <th width="20%">Jabatan</th>
                                                <th width="5%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($konek, "SELECT * FROM tbl_riil ORDER BY id DESC");
                                            $no = 1;
                                            while ($d = mysqli_fetch_assoc($query)) {
                                                echo "
                                                    <tr>
                                                        <td>$no</td>
                                                        <td>$d[nospd]</td>
                                                        <td>$d[tglspd]</td>
                                                        <td>$d[laksanaspd]</td>
                                                        <td>$d[niplaksanaspd]</td>
                                                        <td>$d[jabatan]</td>
                                                        <td>
                                                            <div class='btn-group'>
                                                ";
                                                ?>
                                                                <a href='<?= $url; ?>views/page/isian/cetak_riil.php?id=<?= $d['id']; ?>' target="_blank" class='btn btn-xs btn-success'><i class='fas fa-print' style='color: white;'></i></a>
                                                                <a href='<?= $url; ?>views/page/isian/form_update_riil.php?id=<?= $d['id']; ?>' class='btn btn-xs btn-info'><i class='fas fa-edit' style='color: white;'></i></a>
                                                                <button type='button' class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modal-hapus$d[id]'>
                                                                    <i class='fas fa-trash'></i>
                                                                </button>
                                                <?php
                                                echo "
                                                            </div>
                                                        </td>
                                                        
                                                    </tr>
                                                    ";

                                                echo "";
                                            ?>
                                                <div class="modal fade" id="modal-hapus<?= $d['id']; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content justify-content-center">
                                                            <form action="<?= $url; ?>views/page/isian/riil.php" method="post">
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

        </div>
        <?php include '../../layout/footer.php'; ?>
    </div>
    <?php include '../../layout/js.php'; ?>
</body>
</html>