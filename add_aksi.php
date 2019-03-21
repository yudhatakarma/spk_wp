<?php 

require_once('koneksi.php'); // Koneksi Ke Database

// Mengambil Data Yang Dikirim Dari Form
$nama 			= $_POST['nama'];
$pendidikan 	= $_POST['pendidikan'];
$nilai 			= $_POST['nilai'];
$kehadiran 		= $_POST['kehadiran'];
$penghasilan 	= $_POST['penghasilan'];
$tanggungan 	= $_POST['tanggungan'];


// Proses Menambahkan Data Ke Database
$query = "INSERT INTO tbl_alternatif (nama, pendidikan, nilai, kehadiran, penghasilan_ortu, tanggungan_ortu) VALUES ('$nama','$pendidikan', '$nilai','$kehadiran','$penghasilan','$tanggungan')";
if(mysqli_query($koneksi, $query)){
	header("location:index.php");
}else{
	echo $query;
}