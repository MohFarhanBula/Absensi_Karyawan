<?php
	if (isset($_POST['submit'])) {
		$id = $_POST['id'];

		$nik = $_POST['nik'];
		$nama_karyawan = $_POST['nama_karyawan'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$jabatan = $_POST['jabatan'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$hak_akses = $_POST['hak_akses'];
		$photo = $_FILES['photo']['name'];

		
		$cek_nik = mysqli_query($koneksi, "SELECT nik FROM data_karyawan WHERE nik = '$nik' ");
		$hsnik = mysqli_num_rows($cek_nik);

		$cek_username = mysqli_query($koneksi, "SELECT username FROM data_karyawan WHERE username = '$username' ");
		$hsnik = mysqli_num_rows($cek_username);

		
		$cekcek = mysqli_query($koneksi, "SELECT nik FROM data_karyawan WHERE id = '$id' ");
		$hs = mysqli_fetch_array($cekcek);
		$niknik = $hs['nik'];


		$namename = mysqli_query($koneksi, "SELECT username FROM data_karyawan WHERE id = '$id' ");
		$hss = mysqli_fetch_array($namename);
		$serser = $hss['username'];


		if ($hsnik == 0 OR $nik == $niknik AND $niknik == 0 OR $username == $serser) {
			

		if($photo != "") {
			$ektensi_diperbolehkan = array('png','jpg','jpeg');
			$x = explode('.', $photo);
			$ektensi = strtolower(end($x));
			$file_tmp = $_FILES['photo']['tmp_name'];
			$angka_acak = rand(1,999);
			$nama_gambar_baru = $angka_acak.'-'.$photo;
			if (in_array($ektensi, $ektensi_diperbolehkan) === true) {
				move_uploaded_file($file_tmp, 'foto/'.$nama_gambar_baru);	

			if ($password == "") {
				$q = mysqli_query($koneksi, "SELECT * FROM data_karyawan WHERE id =  '$id' ");
				while ($c = mysqli_fetch_array($q)) {
					$pw = $c['password'];
				}

				 $query = mysqli_query($koneksi, "UPDATE data_karyawan SET nik = '$nik', nama_karyawan = '$nama_karyawan', jenis_kelamin = '$jenis_kelamin', jabatan = '$jabatan', username = '$username', password = '".$pw."', foto = '$nama_gambar_baru', akses = '$hak_akses' WHERE id = '$id' ");

				 $a = mysqli_query($koneksi, "UPDATE absensi SET nik = '$nik', nama_karyawan = '$nama_karyawan', jabatan = '$jabatan', foto = '$nama_gambar_baru' WHERE nik = '$nik' ");

			}else{

				$query = mysqli_query($koneksi, "UPDATE data_karyawan SET nik = '$nik', nama_karyawan = '$nama_karyawan', jenis_kelamin = '$jenis_kelamin', jabatan = '$jabatan', username = '$username', password = '".md5($_POST['password'])."', foto = '$nama_gambar_baru', akses = '$hak_akses' WHERE id = '$id' ");

				 $b = mysqli_query($koneksi, "UPDATE absensi SET nik = '$nik', nama_karyawan = '$nama_karyawan', jabatan = '$jabatan', foto = '$nama_gambar_baru' WHERE nik = '$nik' ");

			}		
				if (!$query) {
					?>
						<script type="text/javascript">
							alert("Data Gagal Di Ubah");
							window.location = "?page=data_karyawan";
						</script>
					<?php
				}else{
					?>
						<script type="text/javascript">
							alert("Data Berhasil Di Ubah");
							window.location = "?page=data_karyawan";
						</script>
					<?php
				}
			}else{
				?>
						<script type="text/javascript">
							alert("Ekstensi Gambar Yang boleh hanya jpg, jpeg, atau png");
							window.location = "?page=data_karyawan";
						</script>
					<?php
			}
		}else{
			if ($password == "") {
				$q = mysqli_query($koneksi, "SELECT * FROM data_karyawan WHERE id =  '$id' ");
				while ($c = mysqli_fetch_array($q)) {
					$pw = $c['password'];
				}				

				$query = mysqli_query($koneksi, "UPDATE data_karyawan SET nik = '$nik', nama_karyawan = '$nama_karyawan', jenis_kelamin = '$jenis_kelamin', jabatan = '$jabatan', username = '$username', password = '".$pw."', akses = '$hak_akses' WHERE id = '$id' ");

				 $c = mysqli_query($koneksi, "UPDATE absensi SET nik = '$nik', nama_karyawan = '$nama_karyawan', jabatan = '$jabatan' WHERE nik = '$nik' ");

			}else{
				$q = mysqli_query($koneksi, "SELECT * FROM data_karyawan WHERE id = '$id' ");
				while ($c = mysqli_fetch_array($q)) {
					$pw = $c['password'];
				}
				

				$query = mysqli_query($koneksi, "UPDATE data_karyawan SET nik = '$nik', nama_karyawan = '$nama_karyawan', jenis_kelamin = '$jenis_kelamin', jabatan = '$jabatan', username = '$username', password = '".md5($_POST['password'])."', akses = '$hak_akses' WHERE id = '$id' ");

				$d = mysqli_query($koneksi, "UPDATE absensi SET nik = '$nik', nama_karyawan = '$nama_karyawan', jabatan = '$jabatan' WHERE nik = '$nik' ");
			}
		
				if (!$query) {
					?>
						<script type="text/javascript">
							alert("Data Gagal Di Ubah");
							window.location = "?page=data_karyawan";
						</script>
					<?php
				}else{
					?>
						<script type="text/javascript">
							alert("Data Berhasil Di Ubah");
							window.location = "?page=data_karyawan";
						</script>
					<?php
				}
		}
	}else{
			?>
				<script type="text/javascript">
					alert("Nik Atau Username Sudah Di Gunakan");
					window.location = "?page=data_karyawan";
				</script>
			<?php
		}
		
	}
?>