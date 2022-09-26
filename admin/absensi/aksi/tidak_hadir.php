<?php
	if (isset($_GET['id']) && isset($_GET['nik'])) {
    $id = $_GET['id'];
    $nik = $_GET['nik'];
    $tanggal = date('Y-m-d');
    $jam = date('H:i:s');
    $status = "tidak hadir";
    $status1 = "belum absen";
    
    $ht = date('Y-m-d', strtotime('+1 day',strtotime($tanggal)));

    // var_dump($id,$nik,$tanggal,$jam,$status)

    $query = mysqli_query($koneksi, "SELECT * FROM absensi WHERE nik = '$nik' ");
    $data = mysqli_fetch_array($query);

    $nama_karyawan = $data['nama_karyawan'];
    $jabatan = $data['jabatan'];
    $foto = $data['foto'];
    


     $query1 =  mysqli_query($koneksi, "INSERT INTO absensi (nik,nama_karyawan,jabatan, status, foto, tanggal_sekarang) VALUES ('$nik','$nama_karyawan','$jabatan','$status1','$foto', '$ht') ");

    $query3 = mysqli_query($koneksi, "UPDATE absensi SET tanggal = '$tanggal', jam = '$jam', status = '$status' WHERE id = '$id' ");


    if ($query3) {
      ?>
        <script type="text/javascript">
          alert("Terima kasih");
          window.location = "?page=absensi";
        </script>
      <?php
    }else{
      ?>
        <script type="text/javascript">
          alert("Gagal");
        </script>
      <?php
    }
  }
?>