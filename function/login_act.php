<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'connect.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from data_karyawan where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['akses']=="Admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['akses'] = "Admin";
		$_SESSION['nik'] = $data['nik'];
		// alihkan ke halaman dashboard admin
		header("location:../admin.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['akses']=="Pegawai"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['akses'] = "Pegawai";
		$_SESSION['nik'] = $data['nik'];

		// alihkan ke halaman dashboard pegawai
		header("location:../pegawai.php");
	}else{
 
		?>
			<script type="text/javascript">
				alert("Username Dan Password Salah!");
				window.location = "../index.php";
			</script>
		<?php
	}	
}else{
	?>
			<script type="text/javascript">
				alert("Username Dan Password Salah!");
				window.location = "../index.php";
			</script>
		<?php
}
 
?>