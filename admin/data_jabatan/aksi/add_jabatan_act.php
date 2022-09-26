<?php
	if (isset($_POST['submit'])) {
		$nama_jabatan = $_POST['nama_jabatan'];

		$query = mysqli_query($koneksi, "INSERT INTO data_jabatan(nama_jabatan) VALUES ('$nama_jabatan')");

		if ($query) {
			?>
				<script type="text/javascript">
					alert("Data Berhasil Di Simpan");
					window.location = "?page=data_jabatan";
				</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
				alert("Data Gagal Di Simpan");
				window.location = "?page=data_jabatan";
			</script>
			<?php
		}
	}

?>