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
	<link rel="stylesheet" href="assets/css/all.min.css">
</head>
<body>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h3 class="text-center" style="text-transform: uppercase;">Sistem Pendukung Keputusan Menggunakan Metode WP</h3>
		</div>
	</div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				
				
				<a href="add.php" class="btn btn-sm btn-outline-primary mb-3"><i class="fas fa-user-plus"></i> Tambah Data</a>

				<table class="table">
					<tr>
						<td width="35%">Bobot Nilai</td>
						<td>0,4</td>
					</tr>
					<tr>
						<td>Bobot Kehadiran</td>
						<td>0,3</td>
					</tr>
					<tr>
						<td>Bobot Penghasilan Orang Tua</td>
						<td>0,1</td>
					</tr>
					<tr>
						<td>Bobot Jumlah Tanggungan Orang Tua</td>
						<td>0,2</td>
					</tr>
				</table>

				<div class="card mt-2 mb-3">
					<div class="card-header bg-primary text-white">Data Setiap Alternatif</div>
					<div class="card-body">
						<table class="table   table-hover">
							<tr>
								<th>Nama</th>
								<th>Pendidikan</th>
								<th>Nilai</th>
								<th>Kehadiran</th>
								<th>Penghasilan Ortu</th>
								<th>Tanggungan Ortu</th>
								<th>Aksi</th>
							</tr>

							<?php 
								$result = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif ORDER BY id ASC");

									while($user_data = mysqli_fetch_array($result)){
									echo "<tr>";
									echo "<td>".$user_data['nama']."</td>";
									echo "<td>".$user_data['pendidikan']."</td>";
									echo "<td>".$user_data['nilai']."</td>";
									echo "<td>".$user_data['kehadiran']."</td>";
									echo "<td>".$user_data['penghasilan_ortu']."</td>";
									echo "<td>".$user_data['tanggungan_ortu']."</td>";
									echo "<td> <a href='delete.php?id=$user_data[id]' class='btn btn-sm btn-outline-danger'><i class='fas fa-trash-alt'></i> Hapus</a></td></tr>";
									echo "</tr>";

								}
							?>
						</table>


					</div>
				</div>


				<div class="card mb-3">
					<div class="card-header bg-success text-white">Persamaan 2</div>
					<div class="card-body">
						<table class="table   table-hover">
							<tr>
								<th>Nama</th>
								<th>Persamaan 2</th>
							</tr>
							<?php 
								$result = mysqli_query($koneksi, "SELECT nama,nilai,kehadiran,penghasilan_ortu,tanggungan_ortu FROM tbl_alternatif ORDER BY id ASC");

								while($user_data = mysqli_fetch_array($result)){
									$hasil = pow($user_data['nilai'], $b_nilai)*
											 pow($user_data['kehadiran'], $b_kehadiran)*
											 pow($user_data['penghasilan_ortu'], -$b_penghasilan_ortu)*
											 pow($user_data['tanggungan_ortu'], -$b_tanggungan_ortu);
									$total=$hasil;

									echo "<tr>";
									echo "<td>".$user_data['nama']."</td>";
									echo "<td>". "(". $user_data['nilai']. "^". $b_nilai. ")"."*(".$user_data['kehadiran']."^".$b_kehadiran. ")".
										"*(".$user_data['penghasilan_ortu']."^".-$b_penghasilan_ortu.")".
										"*(".$user_data['tanggungan_ortu']."^".-$b_tanggungan_ortu. ")"."=".$hasil. "</td>";
									
									echo "</tr>";
								}
							?>

						</table>
					</div>
				</div>


				<div class="card mb-3">
					<div class="card-header bg-danger text-white">Persamaan 3</div>
					<div class="card-body">
						<table class="table table-hover  ">
							<tr>
								<th>Nama</th>
								<th>Persamaan 3</th>
							</tr>
							<?php 
								$result = mysqli_query($koneksi, "SELECT nama,nilai,kehadiran,penghasilan_ortu,tanggungan_ortu FROM tbl_alternatif ORDER BY id ASC");

								while($user_data = mysqli_fetch_array($result)){
									$hasil = pow($user_data['nilai'],$b_nilai)*
											 pow($user_data['kehadiran'],$b_kehadiran)*
											 pow($user_data['penghasilan_ortu'],-$b_penghasilan_ortu)*
											 pow($user_data['tanggungan_ortu'],-$b_tanggungan_ortu);

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