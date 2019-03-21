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
	<title>SPK Metode WP</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>


	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				
				<h2 class="text-center">Sistem Pendukung Keputusan Menggunakan Metode WP</h2>

				<a href="add.php" class="btn btn-outline-primary">Tambah Data</a>

				<div class="card">
					<div class="card-header bg-primary text-white">Data Setiap Alternatif</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<tr>
								<th>Nama</th>
								<th>Kehadiran</th>
								<th>Penghasilan Ortu</th>
								<th>Tanggungan Ortu</th>
							</tr>

							<?php 
								$result = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif ORDER BY id ASC");

									while($user_data = mysqli_fetch_array($result)){
									echo "<tr>";
									echo "<td>".$user_data['nama']."</td>";
									echo "<td>".$user_data['nilai']."</td>";
									echo "<td>".$user_data['kehadiran']."</td>";
									echo "<td>".$user_data['penghasilan_ortu']."</td>";
									echo "<td>".$user_data['tanggungan_ortu']."</td>";
									echo "</tr>";

								}
							?>
						</table>


					</div>
				</div>


				<div class="card">
					<div class="card-header bg-danger text-white">Persamaan 2</div>
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<tr>
								<th>nama</th>
								<th>persamaan</th>
							</tr>
							<?php 
								$result = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif ORDER BY id ASC");

								while($user_data = mysqli_fetch_array($result)){
									$hasil = pow($user_data['nilai'],$b_nilai)*
											 pow($user_data['kehadiran'],$b_kehadiran)*
											 pow($user_data['penghasilan_ortu'],-$b_penghasilan_ortu)*
											 pow($user_data['tanggungan_ortu'],-$b_tanggungan_ortu);
									$total+=$hasil;

									echo "<tr>";
									echo "<td>".$user_data['nama']."</td>";
									echo "<td>". "(". $user_data['nilai']. "^". $b_nilai. ")"."*(".$user_data['kehadiran']."^".$b_kehadiran.
										"*(".$user_data['penghasilan_ortu']."^".-$b_penghasilan_ortu.")".
										"*(".$user_data['tanggungan_ortu']."^".-$b_tanggungan_ortu. ")"."=".$hasil. "</td>";
									
									echo "</tr>";
								}
							?>

						</table>
					</div>
				</div>


				<div class="card">
					<div class="card-header bg-success text-white">Persamaan 3</div>
					<div class="card-body">
						<table class="table table-hover table-bordered">
							<tr>
								<th>Nama</th>
								<th>Persamaan 3</th>
							</tr>
							<?php 
								$result = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif ORDER BY id ASC");

								while($user_data = mysqli_fetch_array($result)){
									$hasil = pow($user_data['nilai'],$b_nilai)*
											 pow($user_data['kehadiran'],$b_kehadiran)*
											 pow($user_data['penghasilan_ortu'],$b_penghasilan_ortu)*
											 pow($user_data['tanggungan_ortu'],$b_tanggungan_ortu);

									$total2 = $hasil/$total;
									echo "<tr>";
									echo "<td>".$user_data['nama']."</td>";
									echo "<td>".$hasil."/".$total."=".$total2."</td>";
									echo "</tr>";
								}
							 ?>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>

	
</body>
</html>