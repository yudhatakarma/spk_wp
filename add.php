<?php 
	require_once('koneksi.php');

	$b_nilai = 0.4;
	$b_kehadiran = 0.3;
	$b_penghasilan_ortu = 0.1;
	$b_tanggungan_ortu = 0.2;

	$result = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tambah Data Alternatif</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/all.min.css">
</head>
<body>

	<div class="jumbotron jumbotron-fluid">
		<h4 class="text-center">Tambah Data Alternatif</h4>
	</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<form method="post" action="add_aksi.php">

					<div class="form-group">
						<input type="text" class="form-control" name="nama" placeholder="Nama ">
					</div>
					
					<div class="form-group">
						<select name="pendidikan" class="form-control custom-select" required>
							<option value="">-- Jenjang Pendidikan --</option>
							<option value="S1">S1</option>
							<option value="S2">S2</option>
							<option value="S3">S3</option>
						</select>
					</div>

					<div class="form-group">
						<input type="number" class="form-control" name="nilai" placeholder="Nilai">
					</div>

					<div class="form-group">
						<input type="number" class="form-control" name="kehadiran" placeholder="Kehadiran">
					</div>

					<div class="form-group">
						<input type="number" class="form-control" name="penghasilan" placeholder="Penghasilan Orang Tua">
					</div>

					<div class="form-group">
						<input type="number" class="form-control" name="tanggungan" placeholder="Jumlah Tanggungan Orang Tua">
					</div>

					<div class="form-group text-center">
						<button type="reset" name="reset" class="btn btn-warning"><i class="fas fa-eraser"></i> Reset Data</button>
						<button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	
</body>
</html>