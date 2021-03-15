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
?>
 
 
 <center>
  
<?php
$id = $_GET['id']; // id berasal dari url
$query = "SELECT * FROM tbl_rinciriil WHERE id = $id";
$data = mysqli_query($konek, $query);
?>
<?php

ini_set("display_errors",0);

?>
 <?php
function TanggalIndonesia($date) {
    $date = date('Y-m-d',strtotime($date));
    if($date == '0000-00-00')
        return 'Tanggal Kosong';
 
    $tgl = substr($date, 8, 2);
    $bln = substr($date, 5, 2);
    $thn = substr($date, 0, 4);
 
    switch ($bln) {
        case 1 : {
                $bln = 'Januari';
            }break;
        case 2 : {
                $bln = 'Februari';
            }break;
        case 3 : {
                $bln = 'Maret';
            }break;
        case 4 : {
                $bln = 'April';
            }break;
        case 5 : {
                $bln = 'Mei';
            }break;
        case 6 : {
                $bln = "Juni";
            }break;
        case 7 : {
                $bln = 'Juli';
            }break;
        case 8 : {
                $bln = 'Agustus';
            }break;
        case 9 : {
                $bln = 'September';
            }break;
        case 10 : {
                $bln = 'Oktober';
            }break;
        case 11 : {
                $bln = 'November';
            }break;
        case 12 : {
                $bln = 'Desember';
            }break;
        default: {
                $bln = 'UnKnown';
            }break;
    }
 
    $hari = date('N', strtotime($date));
    switch ($hari) {
        case 0 : {
                $hari = 'Minggu';
            }break;
        case 1 : {
                $hari = 'Senin';
            }break;
        case 2 : {
                $hari = 'Selasa';
            }break;
        case 3 : {
                $hari = 'Rabu';
            }break;
        case 4 : {
                $hari = 'Kamis';
            }break;
        case 5 : {
                $hari = "Jum'at";
            }break;
        case 6 : {
                $hari = 'Sabtu';
            }break;
        default: {
                $hari = 'UnKnown';
            }break;
    }
 
    $tanggalIndonesia = "".$tgl . " " . $bln . " " . $thn;
    return $tanggalIndonesia;
}
?> 
 
<title>Form SPD</title>
 <?php while($d = mysqli_fetch_assoc($data)){ ?>
 <Style type="text/css">
		@media print{
			.no-print{
				display:none;
			}
		}
        *{
            margin: 0;
            padding:0;
            color: #000;
        }
	</Style>
</head>
<body>
<center>
 
    <font size = "2">RINCIAN BIAYA PERJALANAN DINAS 
 <table width="100%" height="37" border="0">
  <tr>
    <th width="30" scope="col"><div align="left">
      <p class="style1">Lampiran SPPD Nomor<br>
       Tanggal</p>
    </div></th>
    <th width="224" scope="col"><div align="left">
      <p>:<span class="style1"> <?php echo $d['nospd'];?><br>
      : <?php echo $d['tglspd'];?></span></p>
    </div></th>
  </tr>
</table>
   
 <table width="100%" height="250" border="1" style="border-collapse: collapse;">
  <tr align="center" bgcolor="#6633CC">
    <th rowspan="2" scope="col"><div align="center"><font color="white" face="Arial, Helvetica, sans-serif">No&nbsp;</font></th>
    <th colspan="4" scope="col"><div align="center"><font color="white"  face="Arial, Helvetica, sans-serif">PERINCIAN BIAYA &nbsp;&nbsp;&nbsp;&nbsp;</font></th>
	<th rowspan="2" scope="col"><font color="white" face="Arial, Helvetica, sans-serif">Jumlah (Rp.) &nbsp;</font></th>
  </tr>
  <tr bgcolor="#FFFFCC">
	<td><div align="center"><font face="Arial, Helvetica, sans-serif">Uraian</font></div></td>
    <td><div align="center"><font face="Arial, Helvetica, sans-serif">Banyaknya</font></div></td>
    <td><div align="center"><font face="Arial, Helvetica, sans-serif">Satuan</font></div></td>
    <td> <div align="center"><font face="Arial, Helvetica, sans-serif">Harga Satuan (Rp) </font></div></td>
  </tr>
  <tr bgcolor="#CCFF99">
    <td width="5" align="center"><font face="Arial, Helvetica, sans-serif">1.<br></font></td>
    <td width="260"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['uraian1'];?></font></td>
    <td width="90" ><div align="center"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['banyak1'];?></font></td>
	 <td width="90" ><div align="center"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['satuan1'];?></font></td>
	 
	 <td width="90"><div align="right"><font face="Arial, Helvetica, sans-serif"> <?php echo number_format($d['hargasatuan1'],0,",","."); ?></font></td>
   <td width="90"><div align="right"><font face="Arial, Helvetica, sans-serif"> <?php echo number_format($d['jumlah1'],0,",","."); ?></font></td>
  </tr>
  
  <tr bgcolor="#CCFF99">
    <td align="center"><font face="Arial, Helvetica, sans-serif">2.<br></font></td>
     <td width="260"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['uraian2'];?></font></td>
    <td width="90" ><div align="center"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['banyak2'];?></font></td>
	 <td width="90" ><div align="center"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['satuan2'];?></font></td>
	 <td width="90"><div align="right"><font face="Arial, Helvetica, sans-serif"> <?php echo number_format($d['hargasatuan2'],0,",","."); ?></font></td>
   <td width="90"><div align="right"><font face="Arial, Helvetica, sans-serif"> <?php echo number_format($d['jumlah2'],0,",","."); ?></font></td>
  </tr>
  <tr bgcolor="#CCFF99">
    <td align="center"><font face="Arial, Helvetica, sans-serif">3.<br></font></td>
     <td width="260"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['uraian3'];?></font></td>
    <td width="90" ><div align="center"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['banyak3'];?></font></td>
	 <td width="90" ><div align="center"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['satuan3'];?></font></td>
	 <td width="90"><div align="right"><font face="Arial, Helvetica, sans-serif"> <?php echo number_format($d['hargasatuan3'],0,",","."); ?></font></td>
   <td width="90"><div align="right"><font face="Arial, Helvetica, sans-serif"><?php echo number_format($d['jumlah3'],0,",","."); ?></font></td>
  </tr>
  <tr bgcolor="#CCFF99">
    <td align="center"><font face="Arial, Helvetica, sans-serif">4.<br></font></td>
     <td width="260"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['uraian4'];?></font></td>
    <td width="90" ><div align="center"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['banyak4'];?></font></td>
	 <td width="90" ><div align="center"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['satuan4'];?></font></td>
	 <td width="90"><div align="right"><font face="Arial, Helvetica, sans-serif"> <?php echo number_format($d['hargasatuan4'],0,",","."); ?></font></td>
   <td width="90"><div align="right"><font face="Arial, Helvetica, sans-serif"> <?php echo number_format($d['jumlah4'],0,",","."); ?></font></td>
  </tr>
  <tr bgcolor="#CCFF99">
    <td align="center"><font face="Arial, Helvetica, sans-serif">5.<br></font></td>
    <td width="260"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['uraian5'];?></font></td>
    <td width="90" ><div align="center"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['banyak5'];?></font></td>
	 <td width="90" ><div align="center"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['satuan5'];?></font></td>
	 <td width="90"><div align="right"><font face="Arial, Helvetica, sans-serif"> <?php echo number_format($d['hargasatuan5'],0,",","."); ?></font></td>
   <td width="90"><div align="right"><font face="Arial, Helvetica, sans-serif"> <?php echo number_format($d['jumlah5'],0,",","."); ?></font></td>
  </tr>
  <tr bgcolor="#CCFF99">
    <td align="center"><font face="Arial, Helvetica, sans-serif">6.<br></font></td>
   <td width="260"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['uraian6'];?></font></td>
    <td width="90" ><div align="center"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['banyak6'];?></font></td>
	 <td width="90" ><div align="center"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['satuan6'];?></font></td>
	 <td width="90"><div align="right"><font face="Arial, Helvetica, sans-serif"> <?php echo number_format($d['hargasatuan6'],0,",","."); ?></font></td>
   <td width="90"><div align="right"><font face="Arial, Helvetica, sans-serif"> <?php echo number_format($d['jumlah6'],0,",","."); ?></font></td>
  </tr>
  <tr bgcolor="#CCFF99">
    <td align="center"><font face="Arial, Helvetica, sans-serif">7.<br></font></td>
     <td width="260"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['uraian7'];?></font></td>
    <td width="90" ><div align="center"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['banyak7'];?></font></td>
	 <td width="90" ><div align="center"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['satuan7'];?></font></td>
	 <td width="90"><div align="right"><font face="Arial, Helvetica, sans-serif"> <?php echo number_format($d['hargasatuan7'],0,",","."); ?></font></td>
   <td width="90"><div align="right"><font face="Arial, Helvetica, sans-serif"> <?php echo number_format($d['jumlah7'],0,",","."); ?></font></td>
  </tr>
  <tr bgcolor="#CCFF99">
    <td align="center"><font face="Arial, Helvetica, sans-serif">8.<br></font></td>
     <td width="260"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['uraian8'];?></font></td>
    <td width="90" ><div align="center"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['banyak8'];?></font></td>
	 <td width="90" ><div align="center"><font face="Arial, Helvetica, sans-serif"> <?php echo $d['satuan8'];?></font></td>
	 <td width="90"><div align="right"><font face="Arial, Helvetica, sans-serif"> <?php echo number_format($d['hargasatuan8'],0,",","."); ?></font></td>
   <td width="90"><div align="right"><font face="Arial, Helvetica, sans-serif"> <?php echo number_format($d['jumlah8'],0,",","."); ?></font></td>
  </tr>
  <tr bgcolor="#FFFFCC">
     <td align="center"><font face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td><font face="Arial, Helvetica, sans-serif">Total</font></td>
    <td><font face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td><font face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td><font face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td><div align="right"><font face="Arial, Helvetica, sans-serif"><?php echo number_format($d['total'],0,",","."); ?></font></td>
  </tr>
  
  
  <tr bgcolor="#CCFF99">
    <td colspan="6"><font face="Arial, Helvetica, sans-serif">Terbilang : 
	<?php 
	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " Belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " Seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " Seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
	$angka = $d['total'];
	?>
	<b><i><?php echo terbilang ($angka);?> Rupiah</i></b>
	</font></td>
  </tr>
</table>

 <style type="text/css">
<!--
.style1 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
<table width="100%" border="0">
  <tr>
    <td width="680"><p class="style1">    
      <p class="style1">Telah dibayar sejumlah:<br>
        Rp. <?php echo number_format($d['total'],0,",","."); ?> <br>
        Bendahara Pengeluaran,<br>
        <br> 
				<U><?php
			   $sqlbendahara=mysqli_query($konek, "SELECT * FROM tbl_bendahara ORDER BY id ASC");
			   
			   while ($dp=mysqli_fetch_array ($sqlbendahara)){
				   echo "$dp[namabendahara]"; 
			   }
			   ?></U><br>
				NIP.<?php
			   $sqlbendahara=mysqli_query($konek, "SELECT * FROM tbl_bendahara ORDER BY id ASC");
			   
			   while ($dp=mysqli_fetch_array ($sqlbendahara)){
				   echo "$dp[nipbendahara]"; 
			   }
			   ?> 
    
    <td width="420"> <p class="style1">Gorontalo, <?= TanggalIndonesia(date('Y-m-d')) ?><br> 
        Telah diterima jumlah uang sebesar<br>
        Rp. <?php echo number_format($d['total'],0,",","."); ?><br>
        Yang menerima, <br>
        <br> 
        <u> <?php echo $d['laksanaspd'];?></u><br>
        NIP.<?php echo $d['niplaksanaspd'];?>
    
    </td>
  </tr>
</table>
 
 <style type="text/css">
<!--
.style1 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
 
<table width="100%" border="0">
  <tr>
    <td colspan="3"><div align="center"><b>PERHITUNGAN SPPD RAMPUNG </b></div></td>
  </tr>
  <tr>
    <td width="309">Ditetapkan Sejumlah <br>
      Yang telah dibayarkan sejumlah <br>
     Sisa kurang/lebih tidak dibayarkan</td>
    <td width="287"> Rp. <?php echo number_format($d['total'],0,",","."); ?><br>
       Rp. <?php echo number_format($d['total'],0,",","."); ?> <br>
     Rp. 0 </td>
    <td width="362">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Pejabat Pembuat Komitmen, <br>
    Balai Karantina Pertanian Kelas II Gorontalo,<br><br>   
				<u><?php
			   $sqlppk=mysqli_query($konek, "SELECT * FROM tbl_ppk ORDER BY id ASC");
			   
			   while ($dp=mysqli_fetch_array ($sqlppk)){
				   echo "$dp[namappk]"; 
			   }
			   ?></u><br>
				NIP.<?php
			   $sqlppk=mysqli_query($konek, "SELECT * FROM tbl_ppk ORDER BY id ASC");
			   
			   while ($dp=mysqli_fetch_array ($sqlppk)){
				   echo "$dp[nipppk]"; 
			   }
			   ?></td>
  </tr>
</table>
 
<style type="text/css">
<!--
.style1 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
<CENTER>
<table width="400" border="0">
  <tr>
    <td width="453"><p class="style1">TA.<br>
     Nomor Bukti <br>
     MAK<br></td>
    <td width="451"> <p class="style1">: <?php echo "".date("Y")." ";?><br>
     :<br>
    : <?php echo $d['akun'];?> <br></td>
  </tr>
</table>
</CENTER> 
<style type="text/css">
<!--
.style1 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
<table width="100%" border="0">
  <tr>
    <td colspan="3"><div align="center" class="style1"><b>KUITANSI/BUKTI PEMBAYARAN </B></div></td>
  </tr>
  <tr>
    <td width="270">Sudah Terima dari <br>
      <br>
	Jumlah Uang<br>
	Terbilang<br>
	Untuk Pembayaran<br> 
	Berdasarkan SPPD<br>
	Nomor<br>
	Tanggal
    </td>
    <td width="20">:<br>
      <br>
	:<br>
	:<br>
	:<br> 
	:<br>
	:<br>
	:<br>
	</td>
    <td width="797">An. Kuasa Pengguna Anggaran/Pejabat Pembuat Komitmen <br> 
    Balai Karantina Pertanian Kelas II Gorontalo<br>
	Rp.<?php echo number_format($d['total'],0,",","."); ?><br>
	<?php echo terbilang ($angka);?> Rupiah<br> 
	<?php echo $d['maksud'];?><br> 
	Pejabat Pembuat Komitmen Balai Karantina Pertanian Kelas II Gorontalo<br>
	<?php echo $d['nospd'];?><br>
	<?php echo $d['tglspd'];?>
	</td>
  </tr>
</table>
  
<style type="text/css">
<!--
.style1 {font-family: Arial, Helvetica, sans-serif}
-->
</style>
<table width="100%" border="0">
  <tr>
    <td width="544"><span class="style1">Setuju Bayar<br>
	Pejabat Pembuat Komitmen,<br><br> 
	
				<u><?php
			   $sqlppk=mysqli_query($konek, "SELECT * FROM tbl_ppk ORDER BY id ASC");
			   
			   while ($dp=mysqli_fetch_array ($sqlppk)){
				   echo "$dp[namappk]"; 
			   }
			   ?></u><br>
				NIP.<?php
			   $sqlppk=mysqli_query($konek, "SELECT * FROM tbl_ppk ORDER BY id ASC");
			   
			   while ($dp=mysqli_fetch_array ($sqlppk)){
				   echo "$dp[nipppk]"; 
			   }
			   ?></td>
	
    <td width="544"><span class="style1">Telah dibayar Lunas Tgl.<br>
	Bendahara Pengeluaran,<br><br> 
	 
				<u><?php
			   $sqlbendahara=mysqli_query($konek, "SELECT * FROM tbl_bendahara ORDER BY id ASC");
			   
			   while ($dp=mysqli_fetch_array ($sqlbendahara)){
				   echo "$dp[namabendahara]"; 
			   }
			   ?></u><br>
				NIP.<?php
			   $sqlbendahara=mysqli_query($konek, "SELECT * FROM tbl_bendahara ORDER BY id ASC");
			   
			   while ($dp=mysqli_fetch_array ($sqlbendahara)){
				   echo "$dp[nipbendahara]"; 
			   }
			   ?></span></td> 
	
    <td width="544"><span class="style1">Gorontalo, <?= TanggalIndonesia(date('Y-m-d'))?><br>
	Yang menerima,<br><br> 
	 
	<u><?php echo $d['laksanaspd'];?></u><br>
	NIP.<?php echo $d['niplaksanaspd'];?></span></td> 
  </tr>
</table>
</center>
</body>
</html>  
  
<?php
	
    } // end while

    mysqli_close($konek); // menutup koneksi ke database
    ?>
	
 <script>
		window.print();
	</script>
	 
</html>
</center> 
<?php
include "footer.php";
?>
 