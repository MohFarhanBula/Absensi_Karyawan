		<!DOCTYPE html>
			<html>
			<head>
				<title>Print Data Absensi Karyawan</title>
			  	<link rel="stylesheet" href="dist/css/adminlte.min.css">

			</head>
			<body>

<?php
	include 'function/connect.php';

	if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
		$bulan = $_GET['bulan'];
		$tahun = $_GET['tahun'];

		?>


				<br>
				<center>
					<h1>DATA LAPORAN ABSENSI BULANAN</h1>	
					<h3>STUDIO TUTORIAL</h3>	
					<hr>
				</center>
				<div class="container">
					            <!-- /.card-header -->
			            <div class="card-body">
			            	Bulan : 
			            	<?php
				     		if ($bulan == '01') {
								echo "Januari";
					 		}else if ($bulan == '02') {
					 			echo "Februari"; 
					 		}else if ($bulan == '03') {
					 			echo "Maret"; 
					 		}else if ($bulan == '04') {
					 			echo "April"; 
					 		}else if ($bulan == '05') {
					 			echo "Mei"; 
					 		}else if ($bulan == '06') {
					 			echo "Juni"; 
					 		}else if ($bulan == '07') {
					 			echo "Juli"; 
					 		}else if ($bulan == '08') {
					 			echo "Agustus"; 
					 		}else if ($bulan == '09') {
					 			echo "September"; 
					 		}else if ($bulan == '10') {
					 			echo "Oktober"; 
					 		}else if ($bulan == '11') {
					 			echo "November"; 
					 		}else if ($bulan == '12') {
					 			echo "Desember"; 
					 		}
				     	?>
				     	<br>
				     	Tahun : <?php echo $tahun; ?>
				     	<br>	<br>	
			              <table id="example1" class="table table-bordered table-striped">
			 				<thead>
			                <tr>
			                	<th>No</th>
			                  	<th>Nik</th>
			                  	<th>Nama Karyawan</th>
			                 	<th>Jabatan</th>
			                  	<th>Hadir</th>
			                  	<th>Tidak Hadir</th>
			                  	<th>Terlambat</th>
			                </tr>
			                </thead>
			                <tbody>
			                <?php
			                  $query = mysqli_query($koneksi, "SELECT DISTINCT nama_karyawan, nik, jabatan FROM absensi WHERE YEAR(tanggal) = '$tahun' AND MONTH(tanggal) = '$bulan'  ");
			                  $no = 1;
			                  while ($data = mysqli_fetch_array($query)) {
                    			$nik1 = $data['nik'];
			                    ?>
			                    <tr>
			                    	<td><?php echo $no++; ?></td>
			                      <td><?php echo $data['nik']; ?></td>
			                      <td><?php echo $data['nama_karyawan']; ?></td>
			                      <td><?php echo $data['jabatan']; ?></td>
			                      <td>
	                        <?php

	                          $a = mysqli_query($koneksi, "SELECT * FROM absensi WHERE status = 'hadir' AND nik = '$nik1'  AND MONTH (tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'  ");
	                          $b = mysqli_num_rows($a);
	                          echo $b;
	                        ?>
	                      </td>  
	                      <td>
	                        <?php
	                          $c = mysqli_query($koneksi, "SELECT * FROM absensi WHERE status = 'tidak hadir' AND nik = '$nik1'  AND MONTH (tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ");
	                          $d = mysqli_num_rows($c);
	                          echo $d;
	                        ?>
	                      </td>  
	                      <td>
	                        <?php
	                          $e = mysqli_query($koneksi, "SELECT * FROM absensi WHERE status = 'terlambat' AND nik = '$nik1' AND MONTH (tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ");
	                          $f = mysqli_num_rows($e);
	                          echo $f;
	                        ?>
	                      </td>  

			                    </tr>
			                    <?php
			                  }
			                ?> 
			              </tbody>
			              	</table>

			              		<br>
			              		<br>
			              		<br>
			              		<br>

			              	<div style="float: right;">
			              		Hormat Kami
			              		<br>
			              		<br>
			              		<br>
			              		<br>
			              		(.....................)
			              	</div>
			              </div>
				</div>
				
		<?php
	}
?>
<script type="text/javascript">
					window.print();
				</script>
			</body>
			</html>