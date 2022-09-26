<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$query = mysqli_query($koneksi, "DELETE FROM data_jabatan WHERE id = '$id' ");

		if ($query) {
			?>
				<script type="text/javascript">
					alert("Data Berhasil Di Hapus");
					window.location = "?page=data_jabatan";
				</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
				alert("Data Gagal Di Hapus");
				window.location = "?page=data_jabatan";
			</script>
			<?php
		}
	}
?>