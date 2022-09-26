<?php
	if (isset($_POST['submit'])) {
		$id = $_POST['id'];
		$nama_jabatan = $_POST['nama_jabatan'];

		$query = mysqli_query($koneksi, "UPDATE data_jabatan SET nama_jabatan = '$nama_jabatan' WHERE id = '$id' ");

		if ($query) {
			?>
				<script type="text/javascript">
					alert("Data Berhasil Di Ubah");
					window.location = "?page=data_jabatan";
				</script>
			<?php
		}else{
			?>
			<script type="text/javascript">
				alert("Data Gagal Di Ubah");
				window.location = "?page=data_jabatan";
			</script>
			<?php
		}
	}
?>