<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Absensi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="?page=absensi">Data Absensi</a></li>
              <li class="breadcrumb-item active">Tambah Absensi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="row container-fluid">
      <!-- /.col -->

      <?php
        $tanggal_sekarang = date('Y-m-d');
        $query = mysqli_query($koneksi, "SELECT * FROM absensi WHERE status = 'belum absen' AND tanggal_sekarang = '$tanggal_sekarang' ");

        while ($data = mysqli_fetch_array($query)) {
        ?>
          <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username"><?php echo $data['nama_karyawan']; ?></h3>
                <h5 class="widget-user-desc"><?php echo $data['jabatan']; ?></h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" style="width: 100px; height:100px;" src="foto/<?php echo $data['foto']; ?>" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <span class="description-text">
                        <a onclick="return confirm('yakin Hadir?')" href="?page=hadir&id=<?php echo $data['id']; ?>&nik=<?php echo $data['nik']; ?>" class="btn btn-success">Hadir</a>
                      </span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <span class="description-text">
                        <a href="?page=tidak_hadir&id=<?php echo $data['id']; ?>&nik=<?php echo $data['nik']; ?>" onclick="return confirm('yakin Tidak Hadir?')" class="btn btn-danger">Tidak Hadir</a>
                      </span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                    <span class="description-text">
                        <a href="?page=terlambat&id=<?php echo $data['id']; ?>&nik=<?php echo $data['nik']; ?>" onclick="return confirm('yakin Terlambat?')" class="btn btn-warning">Terlambat</a>
                    </span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>

          <?php
        }

      ?>

    </div>

      