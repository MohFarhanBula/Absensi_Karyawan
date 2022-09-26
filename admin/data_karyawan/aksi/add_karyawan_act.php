<?php
	if (isset($_POST['submit'])) {

		$nik = $_POST['nik'];
		$nama_karyawan = $_POST['nama_karyawan'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$jabatan = $_POST['jabatan'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$hak_akses = $_POST['hak_akses'];

		$rand = rand();
		$ekstensi =  array('png','jpg','jpeg');
		$filename = $_FILES['foto']['name'];
		$ukuran = $_FILES['foto']['size'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$tanggal_sekarang = date('Y-m-d');

		

		$cek_data = mysqli_query($koneksi, "SELECT nik FROM data_karyawan WHERE nik = '$nik' ");
		$cek = mysqli_num_rows($cek_data);

		$cari_data = mysqli_query($koneksi, "SELECT username FROM data_karyawan WHERE username = '$username' ");
		$cari = mysqli_num_rows($cari_data);

		if ($cek == 0 AND $cari == 0) {
			
			if(!in_array($ext,$ekstensi) ) {
				?>
						<script type="text/javascript">
							alert("Data Gagal Di Simpan");
							window.location = "?page=data_karyawan";
						</script>
					<?php
			}else{
				
				if($ukuran < 1044070){		
					$xx = $rand.'_'.$filename;
					move_uploaded_file($_FILES['foto']['tmp_name'], 'foto/'.$rand.'_'.$filename);
					mysqli_query($koneksi, "INSERT INTO data_karyawan VALUES (NULL,'$nik','$nama_karyawan','$jenis_kelamin','$jabatan','$username','$password','$xx','$hak_akses')");

					$a = mysqli_query($koneksi, "INSERT INTO absensi (nik, nama_karyawan,jabatan, status, foto, tanggal_sekarang) VALUES ('$nik', '$nama_karyawan','$jabatan', 'belum absen','$xx','$tanggal_sekarang') ");
					?>
						<script type="text/javascript">
							alert("Data Berhasil Di Simpan");
							window.location = "?page=data_karyawan";
						</script>

					<?php
				}else{
					?>
						<script type="text/javascript">
							alert("Data Gagal Di Simpan");
							window.location = "?page=data_karyawan";
						</script>
					<?php
				}
			}

		}else{
			?>
				<script type="text/javascript">
					alert("Nik Atau Username Sudah Di Gunakan");
					window.location = "?page=add_karyawan";
				</script>
			<?php
		}
	}
?>