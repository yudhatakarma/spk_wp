<?php 

$host = 'localhost';
$user = 'root';
$pass = '';
$dbs  = 'db_wp';

$koneksi  = mysqli_connect($host, $user, $pass)or die('Koneksi Database Gagal..!');
mysqli_select_db($koneksi, $dbs) or die('Database Tidak Ditemukan..!');