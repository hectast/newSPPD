<?php
session_start();

include '../../../../koneksi.php';
include '../../../../app/login_cek_token.php';
error_reporting(0);

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
	$uraian1=$_POST['uraian1'];$banyak1=$_POST['banyak1']; $satuan1=$_POST['satuan1']; $hargasatuan1=$_POST['hargasatuan1']; $persen1=$_POST['persen1'];$jumlah1=$banyak1*$hargasatuan1*$persen1;  
	$uraian2=$_POST['uraian2'];$banyak2=$_POST['banyak2']; $satuan2=$_POST['satuan2']; $hargasatuan2=$_POST['hargasatuan2']; $persen2=$_POST['persen2'];$jumlah2=$banyak2*$hargasatuan2*$persen2; 
	$uraian3=$_POST['uraian3'];$banyak3=$_POST['banyak3']; $satuan3=$_POST['satuan3']; $hargasatuan3=$_POST['hargasatuan3']; $persen3=$_POST['persen3'];$jumlah3=$banyak3*$hargasatuan3*$persen3;
	$uraian4=$_POST['uraian4'];$banyak4=$_POST['banyak4']; $satuan4=$_POST['satuan4']; $hargasatuan4=$_POST['hargasatuan4']; $persen4=$_POST['persen4'];$jumlah4=$banyak4*$hargasatuan4*$persen4;
	$uraian5=$_POST['uraian5'];$banyak5=$_POST['banyak5']; $satuan5=$_POST['satuan5']; $hargasatuan5=$_POST['hargasatuan5']; $persen5=$_POST['persen5'];$jumlah5=$banyak5*$hargasatuan5*$persen5;
	$uraian6=$_POST['uraian6'];$banyak6=$_POST['banyak6']; $satuan6=$_POST['satuan6']; $hargasatuan6=$_POST['hargasatuan6']; $persen6=$_POST['persen6'];$jumlah6=$banyak6*$hargasatuan6*$persen6;
	$uraian7=$_POST['uraian7'];$banyak7=$_POST['banyak7']; $satuan7=$_POST['satuan7']; $hargasatuan7=$_POST['hargasatuan7']; $persen7=$_POST['persen7'];$jumlah7=$banyak7*$hargasatuan7*$persen7;
	$uraian8=$_POST['uraian8'];$banyak8=$_POST['banyak8']; $satuan8=$_POST['satuan8']; $hargasatuan8=$_POST['hargasatuan8']; $persen8=$_POST['persen8'];$jumlah8=$banyak8*$hargasatuan8*$persen8;
	$total=$jumlah1+$jumlah2+$jumlah3+$jumlah4+$jumlah5+$jumlah6+$jumlah7+$jumlah8;
 

		$simpan=mysqli_query($konek,"INSERT INTO tbl_rinciriil (id,laksanaspd,niplaksanaspd,jabatan,nospd,tglspd,maksud,akun, 
		                      uraian1, banyak1,satuan1,hargasatuan1, persen1,jumlah1,  
							  uraian2, banyak2,satuan2,hargasatuan2, persen2,jumlah2,
		                      uraian3, banyak3,satuan3,hargasatuan3, persen3,jumlah3, 
							  uraian4, banyak4,satuan4,hargasatuan4, persen4,jumlah4,
							  uraian5, banyak5,satuan5,hargasatuan5, persen5,jumlah5, 
							  uraian6, banyak6,satuan6,hargasatuan6, persen6,jumlah6, 
							  uraian7, banyak7,satuan7,hargasatuan7, persen7,jumlah7,
							  uraian8, banyak8,satuan8,hargasatuan8, persen8,jumlah8,total)
						 VALUES  ('$id','$laksanaspd','$niplaksanaspd','$jabatan','$nospd','$tglspd','$maksud','$akun',
						     '$uraian1','$banyak1','$satuan1','$hargasatuan1','$persen1','$jumlah1',
							 '$uraian2','$banyak2','$satuan2','$hargasatuan2','$persen2','$jumlah2', 
							 '$uraian3','$banyak3','$satuan3','$hargasatuan3','$persen3','$jumlah3',		
							 '$uraian4','$banyak4','$satuan4','$hargasatuan4','$persen4','$jumlah4',	 
							 '$uraian5','$banyak5','$satuan5','$hargasatuan5','$persen5','$jumlah5',
							 '$uraian6','$banyak6','$satuan6','$hargasatuan6','$persen6','$jumlah6', 
							 '$uraian7','$banyak7','$satuan7','$hargasatuan7','$persen7','$jumlah7',		
							 '$uraian8','$banyak8','$satuan8','$hargasatuan8','$persen8','$jumlah8','$total')");
											 
	if($simpan){
		echo "
        <script>
            alert('Data Berhasil Disimpan');
            window.location.href='tampil_cetakrincian.php';
        </script>
        ";
		} else{
		echo "
        <script>
        alert('Data Berhasil Disimpan');
        window.location.href='rincian.php';
        </script>
        ";	
		}
	



?>