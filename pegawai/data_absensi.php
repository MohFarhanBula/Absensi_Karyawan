<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Absensi Bulan Ini</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Laporan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
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
                  <th>Hadir</th>
                  <th>Tidak Hadir</th>
                  <th>Terlambat</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    $tahun = date('Y');
                    $bulan = date('m');
                    $query = mysqli_query($koneksi, "SELECT DISTINCT nama_karyawan, nik, jabatan FROM absensi WHERE YEAR(tanggal) = '$tahun' AND MONTH (tanggal) = '$bulan' AND nik = '$nik' ");
                    while ($data = mysqli_fetch_array($query)) {
                      $tanggal = $data['tanggal'];
                      $nik1 = $data['nik'];
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nik']; ?></td>
                        <td><?php echo $data['nama_karyawan']; ?></td>
                        <td><?php echo $data['jabatan']; ?></td>
                        <td>
                        <?php
                          $a = mysqli_query($koneksi, "SELECT * FROM absensi WHERE status = 'hadir' AND nik = '$nik1' AND MONTH (tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'  ");
                          $b = mysqli_num_rows($a);
                          echo $b;
                        ?>
                      </td>  
                      <td>
                        <?php
                          $c = mysqli_query($koneksi, "SELECT * FROM absensi WHERE status = 'tidak hadir' AND nik = '$nik1' AND MONTH (tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ");
                          $d = mysqli_num_rows($c);
                          echo $d;
                        ?>
                      </td>  
                      <td>
                        <?php
                          $e = mysqli_query($koneksi, "SELECT * FROM absensi WHERE status = 'terlambat' AND nik = '$nik1' AND MONTH (tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'  ");
                          $f = mysqli_num_rows($e);
                          echo $f;
                        ?>
                      </td>  
                      </tr>
                      <?php
                    }
                  ?>
                  
                </tbody>
              </table>
            </div>
