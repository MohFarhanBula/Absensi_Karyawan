<?php
  session_start();
  error_reporting(0);
  include 'function/connect.php';
  date_default_timezone_set('Asia/Jakarta');

  if($_SESSION['akses']=="Pegawai"){
    header("location:pegawai.php");
  }else if ($_SESSION['akses']=="") {
    header("Location:index.php");
  }

  $nik =  $_SESSION['nik'];

  $query = mysqli_query($koneksi, "SELECT * FROM data_karyawan WHERE nik = '$nik' ");
  while ($data = mysqli_fetch_array($query)) {
    $nama_karyawan = $data['nama_karyawan'];
    $foto = $data['foto'];
    $jabatan = $data['jabatan'];
  }


?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Web Absensi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto ">

      <li class="nav-item">
        <a class="nav-link" href="?page=logout" >
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary  elevation-4 " style="background-color: #f47d53; color: white;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" style="background-color: #f47d53; color: white;">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Aplikasi Web Absensi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color: #f47d53; color: white;">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="foto/<?php echo $foto; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" >
          <a href="#" class="d-block" style="color: white;"><?php echo $nama_karyawan; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="?page=dashboard" class="nav-link" style="color: white;">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fa fa-dashboard"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=data_karyawan" class="nav-link" style="color: white;">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Karyawan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=data_jabatan" class="nav-link" style="color: white;">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Data Jabatan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=absensi" class="nav-link" style="color: white;">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Absensi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=laporan" class="nav-link" style="color: white;">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php

    //Data Karyawan
    if ($_GET['page']=="data_karyawan") {
      include 'admin/data_karyawan/data_karyawan.php';
    }else if ($_GET['page']=="add_karyawan") {
      include 'admin/data_karyawan/add_karyawan.php';
    }else if ($_GET['page']=="add_karyawan_act") {
      include 'admin/data_karyawan/aksi/add_karyawan_act.php';
    }else if ($_GET['page']=="delete_karyawan") {
      include 'admin/data_karyawan/aksi/delete_karyawan.php';
    }else if ($_GET['page']=="edit_karyawan") {
      include 'admin/data_karyawan/edit_karyawan.php';
    }else if ($_GET['page']=="edit_karyawan_act") {
      include 'admin/data_karyawan/aksi/edit_karyawan_act.php';
    }

    //Dashboard
    else if ($_GET['page']=="dashboard") {
      include 'admin/dashboard.php';
    }

    //Data Jabatan
    else if ($_GET['page']=="data_jabatan") {
      include 'admin/data_jabatan/data_jabatan.php';
    }else if ($_GET['page']=="add_jabatan") {
      include 'admin/data_jabatan/add_jabatan.php';
    }else if ($_GET['page']=="add_jabatan_act") {
      include 'admin/data_jabatan/aksi/add_jabatan_act.php';
    }else if ($_GET['page']=="delete_jabatan") {
      include 'admin/data_jabatan/aksi/delete_jabatan.php';
    }else if ($_GET['page']=="edit_jabatan") {
      include 'admin/data_jabatan/edit_jabatan.php';
    }else if ($_GET['page']=="edit_jabatan_act") {
      include 'admin/data_jabatan/aksi/edit_jabatan_act.php';
    }


    //Logout
    else if ($_GET['page']=="logout") {
      include 'function/logout.php';
    }

    //Absensi
    else if ($_GET['page']=="absensi") {
      include 'admin/absensi/absensi.php';
    }else if ($_GET['page']=="hadir") {
      include 'admin/absensi/aksi/hadir.php';
    }else if ($_GET['page']=="add_absensi") {
      include 'admin/absensi/add_absensi.php';
    }else if ($_GET['page']=="hadir") {
      include 'admin/absensi/aksi/hadir.php';
    }else if ($_GET['page']=="tidak_hadir") {
      include 'admin/absensi/aksi/tidak_hadir.php';
    }else if ($_GET['page']=="terlambat") {
      include 'admin/absensi/aksi/terlambat.php';
    }

    //Laporan
    else if ($_GET['page']=="laporan") {
      include 'admin/laporan.php';
    }

    else{
      include 'admin/dashboard.php';
    }


  ?>    

  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 | Studio Tutorial .</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
