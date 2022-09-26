<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Data Absensi</h1>
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
    <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
   <div class="card mb-3">
  <div class="card-header bg-primary text-white">
    Filter Data Absensi Pegawai
  </div>
  <div class="card-body">
    <form class="form-inline" action="?page=laporan" method="POST">
    <div class="form-group mb-2">
      <label for="staticEmail2">Bulan</label>
      <select class="form-control ml-3" name="bulan" required="">
        <option value=""> Pilih Bulan </option>
        <option value="01">Januari</option>
        <option value="02">Februari</option>
        <option value="03">Maret</option>
        <option value="04">April</option>
        <option value="05">Mei</option>
        <option value="06">Juni</option>
        <option value="07">Juli</option>
        <option value="08">Agustus</option>
        <option value="09">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
      </select>
    </div>
    <div class="form-group mb-2 ml-5">
      <label for="staticEmail2">Tahun</label>
      <select class="form-control ml-3" name="tahun" required="">
        <option value=""> Pilih Tahun </option>
        <?php $tahun = date('Y');
        for($i=date('Y');$i<$tahun+6;$i++) { ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
    <?php }?>
    </select>
      </select>
    </div>
    
    <button type="submit" name="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-search"></i> Cari Data Absensi Pegawai</button>
  </form>
  </div>
</div>


         <div class="card">

          <?php

  if (isset($_POST['submit'])) {
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];

  ?>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="print_laporan.php?bulan=<?php echo $bulan ?>&tahun=<?php echo $tahun; ?>" target="_blank" style="margin-bottom: 10px" class="btn btn-danger float-sm-right" >Print Data <i class="fa fa-print"></i></a>
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
                  $query = mysqli_query($koneksi, "SELECT DISTINCT nama_karyawan, nik, jabatan FROM absensi WHERE YEAR(tanggal) = '$tahun' AND MONTH (tanggal) = '$bulan'  ");
                  $no = 1;
                  while ($data = mysqli_fetch_array($query)) {
                    $id = $data['id'];
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
                          $e = mysqli_query($koneksi, "SELECT * FROM absensi WHERE status = 'terlambat' AND nik = '$nik1' AND MONTH (tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' ");
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
            <!-- /.card-body -->
                <?php
  }

?>

 
          </div>
  <!-- /.card -->


  
  </div>

    <!-- /.content -->
  </div>

