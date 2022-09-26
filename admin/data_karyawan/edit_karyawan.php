<?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $query = mysqli_query($koneksi, "SELECT * FROM data_karyawan WHERE id = '$id' ");

    while ($data = mysqli_fetch_array($query)) {
      $nama_jabatan = $data['jabatan'];
      ?>
                <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0">Edit Data Karyawan</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="?page=data_Karyawan">Data Karyawan</a></li>
                      <li class="breadcrumb-item active">Edit Data Karyawan</li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
        <div class="content">
          <div class="col-md-12">
            <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Data Karyawan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="?page=edit_karyawan_act" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nik">Nik Karyawan</label>
                      <input type="hidden" name="id" value="<?php echo $id; ?>">
                      <input type="number" class="form-control" required="" value="<?php echo $data['nik']; ?>" name="nik" id="nik" placeholder="Input NIK Karyawan">
                    </div>

                    <div class="form-group">
                      <label for="nama_Karyawan">Nama Karyawan</label>
                      <input type="text" class="form-control" value="<?php echo $data['nama_karyawan']; ?>" required="" name="nama_karyawan" id="nama_jabatan" placeholder="Input Nama Karyawan">
                    </div>

                    <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                      <?php
                        if ($data['jenis_kelamin'] == "L") {
                          ?>
                            <option value="L" selected="">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                          <?php
                        }else{
                          ?>
                            <option value="L">Laki - Laki</option>
                            <option value="P" selected="">Perempuan</option>
                          <?php
                        }
                      ?>
                    </select>
                  </div>


                    <div class="form-group">
                      <label>Jabatan</label>
                      <select name="jabatan" class="form-control" required="">
                        <?php
                          $cc = mysqli_query($koneksi, "SELECT * FROM data_jabatan");
                          while ($dd = mysqli_fetch_array($cc)) {
                            if ($nama_jabatan == $dd['nama_jabatan']) {
                              ?>
                                <option selected="" value="<?php echo $dd['nama_jabatan']; ?>"><?php echo $dd['nama_jabatan']; ?></option>
                              <?php
                            }else{
                              ?>
                                <option  value="<?php echo $dd['nama_jabatan']; ?>"><?php echo $dd['nama_jabatan']; ?></option>
                              <?php
                            }
                          }
                        ?>
                      </select>

                    </div>

                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" required="" value="<?php echo $data['username']; ?>" name="username" id="username" placeholder="Input Username Karyawan">
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="text" class="form-control" name="password" id="password" placeholder="Input Password Karyawan">
                      <i style=" font-size: 11px;color: red">Abaikan jika tidak ingin merubah password</i><br>
                    </div>

                    <div class="form-group">
                      <label>Hak Akses</label>
                      <select name="hak_akses" class="form-control">
                        <?php
                          if ($data['akses'] == "Admin") {
                            ?>
                              <option value="Admin" selected="">Admin</option>
                              <option value="Pegawai">Pegawai</option>
                            <?php
                          }else{
                            ?>
                              <option value="Admin">Admin</option>
                              <option value="Pegawai" selected="">Pegawai</option>
                            <?php
                          }
                        ?>
                      </select>
                    </div>
                    

                    <img src="foto/<?php echo $data['foto']; ?>" style="width: 120px;margin-bottom: 5px;">
                    <div class="form-group">
                      <label for="foto">Foto</label>
                      <div class="input-group">
                        
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="photo" id="foto">
                          <label class="custom-file-label" for="foto">Choose file</label>    
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>

                      </div>
                       <i style=" font-size: 11px;color: red">Abaikan jika tidak merubah gambar</i><br>

                    </div>

                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
          </div>
        </div>
      <?php
    }
  }
?>