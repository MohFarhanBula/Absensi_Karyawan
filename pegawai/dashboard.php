<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        



          <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username"><?php echo $nama_karyawan; ?></h3>
                <h5 class="widget-user-desc"><?php echo $jabatan; ?></h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" style="width: 100px; height:100px;" src="foto/<?php echo $foto; ?>" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Hadir</h5>
                      <?php
                      $bulan = date('m');
                      $tahun = date('Y');
                        $ee = mysqli_query($koneksi, "SELECT * FROM absensi WHERE status = 'hadir' AND nik = '$nik' AND MONTH (tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ");
                        $ff = mysqli_num_rows($ee);
                      ?>
                      <span class="description-text">
                        <?php echo $ff; ?>
                      </span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Tidak Hadir</h5>
                      <?php
                        $bulan = date('m');
                        $tahun = date('Y');

                        $aa = mysqli_query($koneksi, "SELECT * FROM absensi WHERE status = 'tidak hadir' AND nik = '$nik' AND MONTH (tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ");
                        $bb = mysqli_num_rows($aa);
                      ?>
                      <span class="description-text">
                        <?php echo $bb; ?>
                      </span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">Terlambat</h5>
                    <?php
                      $bulan = date('m');
                        $tahun = date('Y');

                        $cc = mysqli_query($koneksi, "SELECT * FROM absensi WHERE status = 'terlambat' AND nik = '$nik'  AND MONTH (tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ");
                        $dd = mysqli_num_rows($cc);
                      ?>
                      <span class="description-text">
                        <?php echo $dd; ?>
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

       


    </div>
    <!-- /.content -->
</div>