<?php
// error_reporting(0);
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
$id = $_POST['id']; 
	$laksanaspd=$_POST['laksanaspd']; $niplaksanaspd=$_POST['niplaksanaspd']; $jabatan=$_POST['jabatan'];$nospd=$_POST['nospd']; $tglspd=$_POST['tglspd'];$maksud=$_POST['maksud']; $akun=$_POST['akun']; 
	$uraian1=$_POST['uraian1'];$banyak1=$_POST['banyak1']; $satuan1=$_POST['satuan1']; $hargasatuan1=$_POST['hargasatuan1']; $jumlah1=$banyak1*$hargasatuan1;
	$uraian2=$_POST['uraian2'];$banyak2=$_POST['banyak2']; $satuan2=$_POST['satuan2']; $hargasatuan2=$_POST['hargasatuan2']; $jumlah2=$banyak2*$hargasatuan2;
	$uraian3=$_POST['uraian3'];$banyak3=$_POST['banyak3']; $satuan3=$_POST['satuan3']; $hargasatuan3=$_POST['hargasatuan3'];  $jumlah3=$banyak3*$hargasatuan3;
	$uraian4=$_POST['uraian4'];$banyak4=$_POST['banyak4']; $satuan4=$_POST['satuan4']; $hargasatuan4=$_POST['hargasatuan4']; $jumlah4=$banyak4*$hargasatuan4;
	$uraian5=$_POST['uraian5'];$banyak5=$_POST['banyak5']; $satuan5=$_POST['satuan5']; $hargasatuan5=$_POST['hargasatuan5'];$jumlah5=$banyak5*$hargasatuan5;
	$uraian6=$_POST['uraian6'];$banyak6=$_POST['banyak6']; $satuan6=$_POST['satuan6']; $hargasatuan6=$_POST['hargasatuan6']; $jumlah6=$banyak6*$hargasatuan6;
	$uraian7=$_POST['uraian7'];$banyak7=$_POST['banyak7']; $satuan7=$_POST['satuan7']; $hargasatuan7=$_POST['hargasatuan7'];  $jumlah7=$banyak7*$hargasatuan7;
	$uraian8=$_POST['uraian8'];$banyak8=$_POST['banyak8']; $satuan8=$_POST['satuan8']; $hargasatuan8=$_POST['hargasatuan8']; $jumlah8=$banyak8*$hargasatuan8;
	$total=$jumlah1+$jumlah2+$jumlah3+$jumlah4+$jumlah5+$jumlah6+$jumlah7+$jumlah8; 
 
	
		$edit=mysqli_query($konek,"UPDATE tbl_rinciriil SET laksanaspd='$laksanaspd',niplaksanaspd='$niplaksanaspd',jabatan='$jabatan',nospd='$nospd', tglspd='$tglspd', maksud='$maksud', akun='$akun',
		                      uraian1='$uraian1', banyak1='$banyak1',satuan1='$satuan1',hargasatuan1='$hargasatuan1',jumlah1='$jumlah1',  
							  uraian2='$uraian2', banyak2='$banyak2',satuan2='$satuan2',hargasatuan2='$hargasatuan2',jumlah2='$jumlah2',
		                      uraian3='$uraian3', banyak3='$banyak3',satuan3='$satuan3',hargasatuan3='$hargasatuan3',jumlah3='$jumlah3', 
							  uraian4='$uraian4', banyak4='$banyak4',satuan4='$satuan4',hargasatuan4='$hargasatuan4',jumlah4='$jumlah4',
							  uraian5='$uraian5', banyak5='$banyak5',satuan5='$satuan5',hargasatuan5='$hargasatuan5',jumlah5='$jumlah5', 
							  uraian6='$uraian6', banyak6='$banyak6',satuan6='$satuan6',hargasatuan6='$hargasatuan6',jumlah6='$jumlah6', 
							  uraian7='$uraian7', banyak7='$banyak7',satuan7='$satuan7',hargasatuan7='$hargasatuan7',jumlah7='$jumlah7',
							  uraian8='$uraian8', banyak8='$banyak8',satuan8='$satuan8',hargasatuan8='$hargasatuan8',jumlah8='$jumlah8',total='$total'
							  WHERE id ='$id'");
						  							 
		if($edit){
		echo"
        <script>
        alert('Data berhasil diubah');
       window.location.href='tampil_cetakrincian';
        </script>
        ";
		}else{
			echo"
        <script>
        alert('Data Gagal diubah');
        window.location.href='tampil_cetakrincian.php';
        </script>
        ";
		}
	


?>