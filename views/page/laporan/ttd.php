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

<head>
	<title>TTD CETAK</title>
	<Style type="text/css">
		@media print{
			.no-print{
				display:none;
			}
		}
	</Style>
</head>
<html>
<body>
<table width="100%">
	<tr>
	<td></td>
	<td width="250px">
		<p>Gorontalo, <?= TanggalIndonesia(date('Y-m-d')) ?><br/>
		Kepala Balai,</p>
	 
	 <img src="../../../assets/temp/sahrir.png" width="50px">
	 
		<p><u>Ir. MUHAMMAD SAHRIR, MM</u><BR> 
		 NIP. 196502231991031001</p>
		 
	</td>
</tr>
</table><center>
</center>
</body>
</html>
