<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Karyawan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Karyawan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
       <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Data Karyawan</h3>
                <div class="float-sm-right">
                  <a href="?page=add_karyawan" class="btn btn-success">Tambah Data</a>
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
                    <th>JK</th>
                    <th>Jabatan</th>
                    <th>Foto</th>
                    <th>Akses Login</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM data_karyawan");
                    $no = 1;
                    
                    while ($data = mysqli_fetch_array($query)) {
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nik']; ?></td>
                        <td><?php echo $data['nama_karyawan']; ?></td>
                        <td><?php echo $data['jenis_kelamin']; ?></td>
                        <td><?php echo $data['jabatan']; ?></td>
                        <td><img width="50px" height="50px" src="foto/<?php echo $data['foto']; ?>"></td>
                        <td><?php echo $data['akses']; ?></td>
                        <td>
                          <div class="btn-group">
                            <a href="?page=edit_karyawan&id=<?php echo $data['id']; ?>&nik=<?php echo $data['nik']; ?>" class="btn btn-warning btn-flat">
                              <i class="fa fa-pen"></i>
                            </a>
                            <a href="?page=delete_karyawan&id=<?php echo $data['id']; ?>&nik=<?php echo $data['nik']; ?>" class="btn btn-danger btn-flat">
                              <i class="fas fa-trash"></i>
                            </a>
                          </div>
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