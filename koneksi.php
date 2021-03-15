<?php
$konek = mysqli_connect("localhost","root","","sppd");
if (!$konek){
		echo "Koneksi ke Database Gagal .....!!!";
}