<?php
  function hari_ini(){
  $hari = date ("D");
 
  switch($hari){
    case 'Sun':
      $hari_ini = "Minggu";
    break;
 
    case 'Mon':     
      $hari_ini = "Senin";
    break;
 
    case 'Tue':
      $hari_ini = "Selasa";
    break;
 
    case 'Wed':
      $hari_ini = "Rabu";
    break;
 
    case 'Thu':
      $hari_ini = "Kamis";
    break;
 
    case 'Fri':
      $hari_ini = "Jumat";
    break;
 
    case 'Sat':
      $hari_ini = "Sabtu";
    break;
    
    default:
      $hari_ini = "Tidak di ketahui";   
    break;
  }
 return "<b>" . $hari_ini . "</b>";

}
?>
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Kehadiran Karyawan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Absensi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
       <div class="card">
              <div class="card-header pull-right">
                <h3 class="card-title">Data Absensi Tanggal : <?php echo hari_ini(); ?>, <?php echo date('d-m-Y'); ?></h3>
                <div class="float-sm-right">
                  <?php
                    $tanggal_sekarang = date('Y-m-d');
                    $query = mysqli_query($koneksi, "SELECT * FROM absensi WHERE tanggal_sekarang = '$tanggal_sekarang' AND status = 'belum absen' ");
                    $cek = mysqli_num_rows($query);

                    if ($cek > 0) {
                      ?>
                        <a href="?page=add_absensi" class="btn btn-success">Absen Sekarang</a>
                      <?php
                    }else{
                      ?>
                        <span class="right badge badge-success">Terima Kasih Semua Absensi Telah Selesai</span>
                      <?php
                    }
                    ?>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nik</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $tanggal_sekarang = date('Y-m-d');
                    $query = mysqli_query($koneksi, "SELECT * FROM absensi WHERE tanggal_sekarang = '$tanggal_sekarang' ");
                    $no = 1;
                    while ($data = mysqli_fetch_array($query)) {
                      $id = $data['id'];
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nik']; ?></td>
                        <td><?php echo $data['nama_karyawan']; ?></td>
                        <td><?php echo $data['jabatan']; ?></td>
                        <td>
                          <?php
                            if ($data['tanggal'] == "0000-00-00") {
                              ?>
                                 <span class="right badge badge-danger">Tidak Ada Data</span>
                              <?php
                            }else{
                              echo $data['tanggal'];
                            }
                          ?>
                        </td>
                        <td>
                          <?php
                            if ($data['jam'] == "00:00:00") {
                              ?>
                                 <span class="right badge badge-danger">Tidak Ada Data</span>
                              <?php
                            }else{
                              echo $data['jam'];
                            }
                          ?>
                        </td>
                        <td>
                          <?php
                            if ($data['status'] == "belum absen") {
                              ?>
                                 <span class="right badge badge-danger">Belum Melakukan Absensi</span>
                              <?php
                            }else if ($data['status'] == "terlambat") {
                              ?>
                                <span class="right badge badge-warning">Terlambat</span>
                                <span class="right badge badge-success">Absen Terpenuhi</span>
                              <?php
                            }else if ($data['status'] == "tidak hadir") {
                              ?>
                                <span class="right badge badge-warning">Tidak hadir</span>
                                <span class="right badge badge-success">Absen Terpenuhi</span>
                              <?php
                            }else{
                              ?>
                                <span class="right badge badge-success">Absen Terpenuhi</span>
                              <?php
                            }
                          ?>
                        </td>

                      </tr>
                      <?php
                    }
                  ?> 
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>
    <!-- /.content -->