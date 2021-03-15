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
    $nospd = $_POST['nospd'];
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


    $query = $konek->query("SELECT * FROM tbl_spd WHERE nospd = '$nospd'");
    $cek = mysqli_num_rows($query);
    if($cek>0){
        echo '<script>
                  alert ("Nomor SPPD sudah Ada");
                  window.location="formspd01.php";
              </script>';
    }else{
        $simpan = mysqli_query($konek,"INSERT INTO tbl_spd(namapjspd,nippjspd,jabatanpj,laksanaspd, niplaksanaspd, pangkatgol,jabatan,tingkat, maksud, angkut, berangkat,tujuan,lama, tglberangkat,tglkembali,akun, nospt, tglspt, nospd)
		VALUES  ('$namapjspd','$nippjspd','$jabatanpj','$laksanaspd','$niplaksanaspd','$pangkatgol','$jabatan','$tingkat','$maksud','$angkut','$berangkat','$tujuan','$lama','$tglberangkat','$tglkembali','$akun','$nospt','$tglspt','$nospd')");
        if($simpan){
            echo"
            <script>
            alert('Data Berhasil Disimpan');
            window.location.href='tampil_cetakspd.php';
            </script>
            ";
        }
    }
