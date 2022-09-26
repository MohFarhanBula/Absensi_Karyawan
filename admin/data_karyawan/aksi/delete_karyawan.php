<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$nik = $_GET['nik'];
		$query = mysqli_query($koneksi, "DELETE FROM data_karyawan WHERE id = '$id' ");

		$a = mysqli_query($koneksi, "DELETE FROM absensi WHERE nik = '$nik' ");

		if ($query) {
			?>
				<script type="text/javascript">
					alert('Data Berhasil Di hapus');
					window.location = "?page=data_karyawan";
				</script>
			<?php
		}else{
			?>
				<script type="text/javascript">
					alert('Data Gagal Di hapus');
					window.location = "?page=data_karyawan";
				</script>
			<?php
		}
	}
?>	