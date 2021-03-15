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

$id = $_POST['id'];
$namapjspd=$_POST['namapjspd'];
$nippjspd=$_POST['nippjspd'];
$jabatanpj=$_POST['jabatanpj'];
$laksanaspd=$_POST['laksanaspd'];
$niplaksanaspd=$_POST['niplaksanaspd'];
$pangkatgol=$_POST['pangkatgol'];
$jabatan=$_POST['jabatan'];
$tingkat=$_POST['tingkat'];
$maksud=$_POST['maksud'];
$angkut=$_POST['angkut'];
$berangkat=$_POST['berangkat'];
$tujuan=$_POST['tujuan'];
$lama=$_POST['lama'];
$tglberangkat=$_POST['tglberangkat'];
$tglkembali=$_POST['tglkembali'];
$akun=$_POST['akun'];
$nospt=$_POST['nospt'];
$tglspt=$_POST['tglspt'];
$nospd=$_POST['nospd'];

$edit= $konek->query("UPDATE  tbl_spd SET namapjspd='$namapjspd', nippjspd='$nippjspd',jabatanpj='$jabatanpj',laksanaspd='$laksanaspd', niplaksanaspd='$niplaksanaspd', pangkatgol='$pangkatgol', jabatan='$jabatan',
tingkat='$tingkat', maksud='$maksud', angkut='$angkut', berangkat='$berangkat', tujuan='$tujuan', lama='$lama', tglberangkat='$tglberangkat', tglkembali='$tglkembali',
akun='$akun', nospt='$nospt' , tglspt='$tglspt', nospd='$nospd' WHERE id ='$id'");

if($edit){
    echo"
    <script>
    alert('Data berhasil diubah');
    window.location.href='tampil_cetakspd.php';
    </script>
    ";
}else{
    echo"
    <script>
    alert('Terjadi Kesalahan');
    window.location.href='tampil_cetakspd.php';
    </script>
    ";
}