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

?>
<center>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $namapjspd = $_POST['namapjspd'];
        $nippjspd = $_POST['nippjspd'];
        $jabatanpj = $_POST['jabatanpj'];
        $laksanaspd = $_POST['laksanaspd'];
        $niplaksanaspd = $_POST['niplaksanaspd'];
        $pangkatgol = $_POST['pangkatgol'];
        $jabatan = $_POST['jabatan'];
        $tingkat = $_POST['tingkat'];
        $maksud = $_POST['maksud'];
        $angkut = $_POST['angkut'];
        $berangkat = $_POST['berangkat'];
        $tujuan = $_POST['tujuan'];
        $lama = $_POST['lama'];
        $tglberangkat = $_POST['tglberangkat'];
        $tglkembali = $_POST['tglkembali'];
        $akun = $_POST['akun'];
        $nospt = $_POST['nospt'];
        $tglspt = $_POST['tglspt'];
        $nospd = $_POST['nospd'];


        if (
            $namapjspd == '' || $nippjspd == '' || $jabatanpj == '' || $laksanaspd == '' || $niplaksanaspd == '' || $pangkatgol == '' || $jabatan == '' || $tingkat == '' || $maksud == '' || $angkut == '' || $berangkat == '' || $tujuan == '' || $lama == '' || $tglberangkat == '' || $tglkembali == '' ||
            $akun == '' || $nospt == '' || $tglspt == '' || $nospd == ''
        ) {
            echo "<i><b><h3><font color='red'> Isian Form Belum Lengkap Gaezz,Ulangi !!!  </font></h3></b></i>";
        } else {

            $edit = mysqli_query($konek, "UPDATE  tbl_spd SET namapjspd='$namapjspd', nippjspd='$nippjspd',jabatanpj='$jabatanpj',laksanaspd='$laksanaspd', niplaksanaspd='$niplaksanaspd', pangkatgol='$pangkatgol', jabatan='$jabatan',
tingkat='$tingkat', maksud='$maksud', angkut='$angkut', berangkat='$berangkat', tujuan='$tujuan', lama='$lama', tglberangkat='$tglberangkat', tglkembali='$tglkembali',
akun='$akun', nospt='$nospt' , tglspt='$tglspt', nospd='$nospd' WHERE id ='$id'");
            if (!$edit) {

                header("location:tampil_cetakspd2.php");
            } else {
                echo "Edit data gagal";
            }
        }
    }
    ?>
    <?php
    $id = $_GET['id']; // id berasal dari url
    $query = "SELECT * FROM tbl_spd WHERE id = $id";
    $data = mysqli_query($konek, $query);
    ?>
    <?php

    ini_set("display_errors", 0);

    ?>

    <title>Form SPD</title>
    <?php while ($row = mysqli_fetch_assoc($data)) { ?>
        <Style type="text/css">
            @media print {
                .no-print {
                    display: none;
                }
            }
        </Style>
        </head>

        <body>
            <center>

                <table>

                    <tr>
                        <td colspan="2"><IMG SRC="../../../assets/dist/img/garuda.jpg" width="20%" style="margin-left: 72%;"> </td>
                        <td align="right">
                            <h6>PERATURAN MENTERI KEUANGAN REPUBLIK<br>
                                INDONESIA NOMOR 113/PMK.05/2012 TENTANG<br>
                                PERJALANAN DINAS JABATAN DALAM NEGERI <br>BAGI
                                PEJABAT NEGARA, PEGAWAI NEGERI, DAN<br> PEGAWAI
                                TIDAK TETAP</h6>
                        </td>

                    </tr>

                    <tr>
                        <td align="Left">
                            <h6>KEMENTERIAN PERTANIAN <br>BADAN KARANTINA PERTANIAN <br>BALAI KARANTINA PERTANIAN KELAS II GORONTALO</h6>
                        </td>

                        <td align="center">
                            <h6>KEMENTERIAN KEUANGAN <br>REPUBLIK INDONESIA</h6>
                        </td>

                        <td align="right">
                            <h6>LEMBAR KE: I/II/III/IV<BR>KODE :---<BR>NOMOR : <?php echo $row['nospd']; ?>

                            </h6>
                        </td>
                        </font>
                </table>
                </div>

                <U>SURAT PERINTAH PERJALANAN DINAS</U>

                <br>
                <p>
                <table border="2" width="100%">

                    <thead>
                        <div class="container">
                            <font face="arial"='14'>
                                <table border="2" width="100%">
                                    <tr>
                                        <td align="center">1.</td>
                                        <td width="35%" colspan="1">Pejabat Pembuat Komitmen</td>
                                        <td width="100%" colspan="2">Balai Karantina Pertanian Kelas II Gorontalo </td>

                                    </tr>
                                    <tr>
                                        <td align="center">2.</td>
                                        <td colspan="1">Nama/NIP Pegawai yang melaksanakan perjalanan dinas</td>
                                        <td colspan="2">

                                            <?php echo $row['laksanaspd']; ?>/<?php echo $row['niplaksanaspd']; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <style>
                                            table,
                                            td {
                                                height: 1px;
                                                vertical-align: top;
                                            }
                                        </style>
                                        <td align="center" rowspan="4">3.</td>
                                    </tr>
                                    <tr>
                                        <td>a. Pangkat dan Golongan</td>
                                        <td colspan="2">a.

                                            <?php echo $row['pangkatgol']; ?>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td>b. Jabatan/Instansi</td>
                                        <td colspan="2">b.
                                            <?php echo $row['jabatan']; ?>

                                            /Balai Karantina Pertanian Kelas II Gorontalo
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>c. Tingkat Biaya Perjalanan Dinas</td>
                                        <td colspan="2">c.
                                            <?php echo $row['tingkat']; ?>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="center">4.</td>
                                        <td>Maksud Perjalanan Dinas</td>
                                        <td colspan="2">
                                            <?php echo $row['maksud']; ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">5.</td>
                                        <td>Alat angkutan yang dipergunakan</td>
                                        <td colspan="2">


                                            <?php echo $row['angkut']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <style>
                                            table,
                                            td {
                                                height: 1px;
                                                vertical-align: top;
                                            }
                                        </style>
                                        <td align="center" rowspan="3">6.</td>
                                    </tr>
                                    <tr>
                                        <td>a. Tempat berangkat</td>
                                        <td colspan="2">a.


                                            <?php echo $row['berangkat']; ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>b. Tempat Tujuan</td>
                                        <td colspan="2">b.


                                            <?php echo $row['tujuan']; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <style>
                                            table,
                                            td {
                                                height: 1px;
                                                vertical-align: top;
                                            }
                                        </style>
                                        <td align="center" rowspan="4">7.</td>
                                    </tr>
                                    <tr>
                                        <td>a. Lamanya Perjalanan Dinas</td>
                                        <td colspan="2">a.


                                            <?php echo $row['lama']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>b. Tanggal Berangkat</td>
                                        <td colspan="2">b.

                                            <?php echo $row['tglberangkat']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>c. Tanggal harus kembali/tiba di tempat baru*)</td>
                                        <td colspan="2">c.

                                            <?php echo $row['tglkembali']; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td align="center">8.</td>
                                        <td>Pengikut : Nama</td>
                                        <td>Tanggal Lahir</td>
                                        <td>Keterangan</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>1.</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>2.</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>3.</td>
                                        <td></td>
                                        <td></td>
                                    </tr>


                                    <tr>
                                        <td align="center">9.</td>
                                        <td>Pembebanan Anggaran</td>
                                        <td colspan="2"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>a.Instansi</td>
                                        <td colspan="2">a. Balai Karantina Pertanian Kelas II Gorontalo </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>b.Akun</td>
                                        <td colspan="2">b.

                                            <?php echo $row['akun']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">10.</td>
                                        <td>Keterangan lain-lain</td>
                                        <td colspan="2">SPT. No.

                                            <?php echo $row['nospt']; ?>, <?php echo $row['tglspt']; ?>
                                        </td>
                                    </tr>
                                    <table border="0" width="100%">
                                        <td colspan="4">
                                            <h5 align="left">*) Coret yang tidak perlu</h5>
                                        </td>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td align="center"> Dikeluarkan di: Gorontalo</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td align="center">Tanggal :

                                                <?php echo $row['tglspt']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td align="center">
                                                <p>Pejabat Pembuat Komitmen,</P>
                                                </br>
                                                </br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td align="center"><u>
                                                    <?php
                                                    $sqlppk = mysqli_query($konek, "SELECT * FROM tbl_ppk ORDER BY id ASC");

                                                    while ($dp = mysqli_fetch_array($sqlppk)) {
                                                        echo "$dp[namappk]";
                                                    }
                                                    ?>
                                                </U></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td> </td>
                                            <td align="center">
                                                <p>NIP.
                                                    <?php
                                                    $sqlppk = mysqli_query($konek, "SELECT * FROM tbl_ppk ORDER BY id ASC");

                                                    while ($dp = mysqli_fetch_array($sqlppk)) {
                                                        echo "$dp[nipppk]";
                                                    }
                                                    ?></p>
                                                <br>
                                                <br>
                                                <br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </td>
                                        </tr>





                                        <table width="100%" border="1">
                                            <tr>
                                                <td align="center">I.&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>Berangkat dari (Tempat Kedudukan): <?php echo $row['berangkat']; ?><br>
                                                    Ke: <?php echo $row['tujuan']; ?> <br>
                                                    Pada Tanggal : <?php echo $row['tglberangkat']; ?><br>
                                                    <h5 align="center">
                                                        <p><?php echo $row['jabatanpj']; ?></P>
                                                    </h5>
                                                    </br></br>
                                                    <h5 align="center"><u><?php echo $row['namapjspd']; ?></U><br>
                                                        NIP : <?php echo $row['nippjspd']; ?>

                                                        &nbsp;
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="center">II.&nbsp;</td>
                                                <td>
                                                    <p>Tiba di:<?php echo $row['tujuan']; ?><br>Pada Tanggal : <?php echo $row['tglberangkat']; ?></P><br><br>&nbsp;
                                                </td>
                                                <td>
                                                    <p>Berangkat dari : <?php echo $row['tujuan']; ?> <br> Ke: <?php echo $row['berangkat']; ?><br>Pada Tanggal : <?php echo $row['tglkembali']; ?></P><br><br><br> &nbsp;
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="center">III.&nbsp;</td>
                                                <td>
                                                    <p>Tiba di:<br>Pada Tanggal :</P><br><br> &nbsp;
                                                </td>
                                                <td>
                                                    <p>Berangkat dari :<br> Ke: <br>Pada Tanggal :</P> &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">IV.&nbsp;</td>
                                                <td>
                                                    <p>Tiba di:<br>Pada Tanggal :</P><br><br> &nbsp;
                                                </td>
                                                <td>
                                                    <p>Berangkat dari :<br> Ke: <br>Pada Tanggal :</P><br><br> &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">V.&nbsp;</td>
                                                <td>
                                                    <p>Tiba kembali di (Tempat Kedudukan): <?php echo $row['berangkat']; ?><br>
                                                        Pada Tanggal : <?php echo $row['tglkembali']; ?><br><br><br>
                                                    <h5 align="center">
                                                        <p>Pejabat Pembuat Komitmen,</P>
                                                    </h5>
                                                    </br></br>
                                                    <h5 align="center"><u>
                                                            <?php
                                                            $sqlppk = mysqli_query($konek, "SELECT * FROM tbl_ppk ORDER BY id ASC");

                                                            while ($dp = mysqli_fetch_array($sqlppk)) {
                                                                echo "$dp[namappk]";
                                                            }
                                                            ?>
                                                        </U><Br>NIP.<?php
                                                                    $sqlppk = mysqli_query($konek, "SELECT * FROM tbl_ppk ORDER BY id ASC");

                                                                    while ($dp = mysqli_fetch_array($sqlppk)) {
                                                                        echo "$dp[nipppk]";
                                                                    }
                                                                    ?>&nbsp;
                                                </td>
                                                <td>
                                                    <h5>
                                                        <p>Telah diperiksa dengan keterangan bahwa perjalanan<br>
                                                            tersebut diatas benar-benar dilakukan atas perintah<br>
                                                            dan semata-mata untuk kepentingan jabatan dalam <br>
                                                            waktu yang sesingkat-singkatnya.
                                                    </h5>
                                                    <h5 align="center">Pejabat Pembuat Komitmen,</P>
                                                    </h5>
                                                    </br></br>
                                                    <h5 align="center"><u>
                                                            <?php
                                                            $sqlppk = mysqli_query($konek, "SELECT * FROM tbl_ppk ORDER BY id ASC");

                                                            while ($dp = mysqli_fetch_array($sqlppk)) {
                                                                echo "$dp[namappk]";
                                                            }
                                                            ?>
                                                        </U><Br>
                                                        <p>NIP.<?php
                                                                $sqlppk = mysqli_query($konek, "SELECT * FROM tbl_ppk ORDER BY id ASC");

                                                                while ($dp = mysqli_fetch_array($sqlppk)) {
                                                                    echo "$dp[nipppk]";
                                                                }
                                                                ?>&nbsp;</P>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td align="center">VI.&nbsp;</td>
                                                <td colspan="2">Catatan Lain-lain :&nbsp;

                                            </tr>
                                            <tr>
                                                <td align="center">VII.&nbsp;</td>
                                                <td colspan="2"> PERHATIAN :
                                                    <h6>PPK yang berwenang menerbitkan SPD, pejabat/pegawai yang melakukan perjalanan dinas, para pejabat
                                                        yang mengesahkan tanggal berangkat/tiba, serta bendahara pengeluaran bertanggung jawab berdasarkan peraturan
                                                        Keuangan Negara apabila negara menderita rugi akibat kesalahan, kelalaian dan kealpaannya.</h6>
                                                </td>
                                                &nbsp;
                                            </tr>
                                        </table>
        </body>


    <?php

    } // end while

    mysqli_close($konek); // menutup koneksi ke database

    ?>

    <script>
        window.print();
    </script>