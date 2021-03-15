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
$jdl = "Cetak Pengeluaran Riil";
$ttl = $jdl . " | SPPD";
?>
<?php
$id = $_GET['id']; // id berasal dari url
$query = "SELECT * FROM tbl_riil WHERE id = $id";
$data = mysqli_query($konek, $query);
?>
<?php

ini_set("display_errors", 0);

?>
<?php
function TanggalIndonesia($date)
{
    $date = date('Y-m-d', strtotime($date));
    if ($date == '0000-00-00')
        return 'Tanggal Kosong';

    $tgl = substr($date, 8, 2);
    $bln = substr($date, 5, 2);
    $thn = substr($date, 0, 4);

    switch ($bln) {
        case 1: {
                $bln = 'Januari';
            }
            break;
        case 2: {
                $bln = 'Februari';
            }
            break;
        case 3: {
                $bln = 'Maret';
            }
            break;
        case 4: {
                $bln = 'April';
            }
            break;
        case 5: {
                $bln = 'Mei';
            }
            break;
        case 6: {
                $bln = "Juni";
            }
            break;
        case 7: {
                $bln = 'Juli';
            }
            break;
        case 8: {
                $bln = 'Agustus';
            }
            break;
        case 9: {
                $bln = 'September';
            }
            break;
        case 10: {
                $bln = 'Oktober';
            }
            break;
        case 11: {
                $bln = 'November';
            }
            break;
        case 12: {
                $bln = 'Desember';
            }
            break;
        default: {
                $bln = 'UnKnown';
            }
            break;
    }

    $hari = date('N', strtotime($date));
    switch ($hari) {
        case 0: {
                $hari = 'Minggu';
            }
            break;
        case 1: {
                $hari = 'Senin';
            }
            break;
        case 2: {
                $hari = 'Selasa';
            }
            break;
        case 3: {
                $hari = 'Rabu';
            }
            break;
        case 4: {
                $hari = 'Kamis';
            }
            break;
        case 5: {
                $hari = "Jum'at";
            }
            break;
        case 6: {
                $hari = 'Sabtu';
            }
            break;
        default: {
                $hari = 'UnKnown';
            }
            break;
    }

    $tanggalIndonesia = "" . $tgl . " " . $bln . " " . $thn;
    return $tanggalIndonesia;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cetak Pengeluaran Riil</title>
    <?php while ($d = mysqli_fetch_assoc($data)) { ?>
        <Style type="text/css">
            * {
                color: black;
            }
            @media print {
                .no-print {
                    display: none;
                }
            }
        </Style>
</head>

<body>
    <center>
        <font face="Arial, Helvetica, sans-serif">
            <div align="center"><B>
                    <H3>DAFTAR PENGELUARAN RIIL</h3>
                </b>
        </FONT>

        <table width="100%" border="0">
            <tr>
                <td width="500">Yang bertanda tangan di bawah ini<br>
                    Nama <br>
                    NIP <br>
                    Jabatan <br>

                </td>
                <td width="16"><br>

                    :<br>
                    :<br>
                    : </p>
                </td>
                <td width="842"><br>
                    <?php echo $d['laksanaspd']; ?><br>
                    <?php echo $d['niplaksanaspd']; ?><br>
                    <?php echo $d['jabatan']; ?> Balai Karantina Pertanian Kelas II Gorontalo
                </td>
            </tr>
        </table>
        <br>
        <style type="text/css">
            
            .style1 {
                font-family: Arial, Helvetica, sans-serif
            }
            
        </style>
        <table width="100%" border="0">
            <tr>
                <td><span class="style1">Berdasarkan Surat Perintah Perjalanan Dinas (SPPD) Tanggal : <?php echo $d['tglspd']; ?> No.<?php echo $d['nospd']; ?>, dengan ini kami menyatakan dengan sesungguhnya bahwa : </span></td>
            </tr>
        </table>

        <style type="text/css">
            
            .style1 {
                font-family: Arial, Helvetica, sans-serif
            }
            
        </style>
        <table width="100%" border="0">
            <tr>
                <style>
                    table,
                    td {
                        height: 1px;
                        vertical-align: top;
                    }
                </style>
                <td width="29">
                    <div align="center" class="style1">1.</div>
                </td>
                <td width="901"><span class="style1">Biaya transpor pegawai dan/atau biaya penginapan di bawah ini yang tidak dapat diperoleh bukti-bukti pengeluarannya, meliputi : </span></td>
            </tr>
        </table>
        <br>

        <style type="text/css">
            
            .style1 {
                font-family: Arial, Helvetica, sans-serif
            }
            
        </style>
        <table width="100%" border="1" style="border-collapse:collapse;border:1px solid black;">
            <tr align="center" bgcolor="#6633CC">
                <td width="57">
                    <font color="white">
                        <div align="center" class="style1">No.</div>
                    </font>
                </td>
                <td width="151">
                    <font color="white">
                        <div align="center" class="style1">Uraian</div>
                    </font>
                </td>
                <td width="104">
                    <font color="white">
                        <div align="center" class="style1">Banyaknya</div>
                    </font>
                </td>
                <td width="104">
                    <font color="white">
                        <div align="center" class="style1">Satuan</div>
                    </font>
                </td>
                <td width="186">
                    <font color="white">
                        <div align="center" class="style1">Harga Satuan (Rp) </div>
                    </font>
                </td>
                <td width="254">
                    <font color="white">
                        <div align="center" class="style1">Jumlah</div>
                    </font>
                </td>
            </tr>

            <tr bgcolor="#FFFFCC">

                <td align="center">
                    <div align="center" class="style1">1.<br></div>
                </td>
                <td><?php echo $d['uraian1']; ?></td>
                <td align="center"> <?php echo $d['banyak1']; ?> </td>
                <td align="center"> <?php echo $d['satuan1']; ?> </td>
                <td align="right"> <?php echo number_format($d['hargasatuan1'], 0, ",", "."); ?> </td>
                <td align="right"><?php echo number_format($d['jumlah1'], 0, ",", "."); ?></span></td>
            </tr>

            <tr bgcolor="#FFFFCC">
                <td align="center">
                    <div align="center" class="style1">2.<br></div>
                </td>
                <td><?php echo $d['uraian2']; ?></td>
                <td align="center"> <?php echo $d['banyak2']; ?> </td>
                <td align="center"> <?php echo $d['satuan2']; ?> </td>
                <td align="right"> <?php echo number_format($d['hargasatuan2'], 0, ",", "."); ?> </td>
                <td align="right"> <?php echo number_format($d['jumlah2'], 0, ",", "."); ?></span></td>
            </tr>

            <tr bgcolor="#FFFFCC">
                <td align="center">
                    <div align="center" class="style1">3.<br></div>
                </td>
                <td><?php echo $d['uraian3']; ?></td>
                <td align="center"> <?php echo $d['banyak3']; ?> </td>
                <td align="center"> <?php echo $d['satuan3']; ?> </td>
                <td align="right"> <?php echo number_format($d['hargasatuan3'], 0, ",", "."); ?> </td>
                <td align="right"> <?php echo number_format($d['jumlah3'], 0, ",", "."); ?></span></td>
            </tr>

            <tr bgcolor="#FFFFCC">
                <td align="center">
                    <div align="center" class="style1">4.<br></div>
                </td>
                <td><?php echo $d['uraian4']; ?></td>
                <td align="center"> <?php echo $d['banyak4']; ?> </td>
                <td align="center"> <?php echo $d['satuan4']; ?> </td>
                <td align="right"> <?php echo number_format($d['hargasatuan4'], 0, ",", "."); ?> </td>
                <td align="right"><?php echo number_format($d['jumlah4'], 0, ",", "."); ?></span></td>
            </tr>

            <tr bgcolor="#FFFFCC">
                <td align="center">
                    <div align="center" class="style1">5.<br></div>
                </td>
                <td><?php echo $d['uraian5']; ?></td>
                <td align="center"> <?php echo $d['banyak5']; ?> </td>
                <td align="center"> <?php echo $d['satuan5']; ?> </td>
                <td align="right"> <?php echo number_format($d['hargasatuan5'], 0, ",", "."); ?> </td>
                <td align="right"> <?php echo number_format($d['jumlah5'], 0, ",", "."); ?></span></td>
            </tr>

            <tr bgcolor="#FFFFCC">
                <td align="center">
                    <div align="center" class="style1">6.<br></div>
                </td>
                <td><?php echo $d['uraian6']; ?></td>
                <td align="center"> <?php echo $d['banyak6']; ?> </td>
                <td align="center"> <?php echo $d['satuan6']; ?> </td>
                <td align="right"> <?php echo number_format($d['hargasatuan6'], 0, ",", "."); ?> </td>
                <td align="right"> <?php echo number_format($d['jumlah6'], 0, ",", "."); ?></span></td>
            </tr>

            <tr bgcolor="#FFFFCC">
                <td align="center">
                    <div align="center" class="style1">7.<br></div>
                </td>
                <td><?php echo $d['uraian7']; ?></td>
                <td align="center"> <?php echo $d['banyak7']; ?> </td>
                <td align="center"> <?php echo $d['satuan7']; ?> </td>
                <td align="right"><?php echo number_format($d['hargasatuan7'], 0, ",", "."); ?> </td>
                <td align="right"> <?php echo number_format($d['jumlah7'], 0, ",", "."); ?></span></td>
            </tr>

            <tr bgcolor="#FFFFCC">
                <td align="center">
                    <div align="center" class="style1">8.<br></div>
                </td>
                <td><?php echo $d['uraian8']; ?></td>
                <td align="center"> <?php echo $d['banyak8']; ?> </td>
                <td align="center"> <?php echo $d['satuan8']; ?> </td>
                <td align="right"> <?php echo number_format($d['hargasatuan8'], 0, ",", "."); ?> </td>
                <td align="right"> <?php echo number_format($d['jumlah8'], 0, ",", "."); ?></span></td>
            </tr>

            <tr bgcolor="#CCFF99">
                <td align="center"><span class="style1"></span></td>
                <td><span class="style1">Total</span></td>
                <td><span class="style1"></span></td>
                <td><span class="style1"></span></td>
                <td><span class="style1"></span></td>
                <td align="right"><span class="style1"><?php echo number_format($d['total'], 0, ",", "."); ?></span></td>
            </tr>

        </table>

        <style type="text/css">
            
            .style1 {
                font-family: Arial, Helvetica, sans-serif
            }
            
        </style>
        <table width="100%" border="0">
            <tr>
                <style>
                    table,
                    td {
                        height: 1px;
                        vertical-align: top;
                    }
                </style>
                <td width="29">
                    <div align="center" class="style1">2.</div>
                </td>
                <td width="901"><span class="style1">Jumlah uang tersebut pada angka 1 diatas benar-benar dikeluarkan untuk pelaksanaan perjalanan dinas dimaksud dan apabila di kemudian hari terdapat kelebihan atas pembayaran, kami bersedia untuk menyetorkan kelebihan tersebut ke Kas Negara.<br>
                        Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.
                    </span></td>
            </tr>
        </table>
        <style type="text/css">
            
            .style1 {
                font-family: Arial, Helvetica, sans-serif
            }
            
        </style>
        <table width="100%" border="0">
            <tr>
                <td width="680">
                    <p class="style1">
                    <p class="style1"><br>Mengetahui/Menyetujui<br>
                        Pejabat Pembuat Komitmen,<br>
                        <br>
                        <br>
                        <u><?php
                            $sqlppk = mysqli_query($konek, "SELECT * FROM tbl_ppk ORDER BY id ASC");

                            while ($dp = mysqli_fetch_array($sqlppk)) {
                                echo "$dp[namappk]";
                            }
                            ?></u><br>
                        NIP. <?php
                                $sqlppk = mysqli_query($konek, "SELECT * FROM tbl_ppk ORDER BY id ASC");

                                while ($dp = mysqli_fetch_array($sqlppk)) {
                                    echo "$dp[nipppk]";
                                }
                                ?>
                </td>
                </td>

                <td width="420">
                    <p class="style1">Gorontalo, <?= TanggalIndonesia(date('Y-m-d')) ?><br><br>

                        Yang menerima, <br>
                        <br>
                        <br>
                        <u><?php echo $d['laksanaspd']; ?></u><br>
                        NIP. <?php echo $d['niplaksanaspd']; ?>

                </td>
            </tr>
        </table>

        <center>
        <?php

    } // end while

    mysqli_close($konek); // menutup koneksi ke database
        ?>

        <script>
            window.print();
        </script>
</body>

</html>