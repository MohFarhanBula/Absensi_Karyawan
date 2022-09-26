<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Data Karyawan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="?page=data_Karyawan">Data Karyawan</a></li>
              <li class="breadcrumb-item active">Tambah Data Karyawan</li>
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
          <h3 class="card-title">Tambah Data Karyawan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="?page=add_karyawan_act" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label for="nik">Nik Karyawan</label>
              <input type="number" class="form-control" required="" name="nik" id="nik" placeholder="Input NIK Karyawan">
            </div>

            <div class="form-group">
              <label for="nama_Karyawan">Nama Karyawan</label>
              <input type="text" class="form-control" required="" name="nama_karyawan" id="nama_jabatan" placeholder="Input Nama Karyawan">
            </div>

            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="jenis_kelamin" class="form-control" required="">
                <option value="">--Pilih Jenis Kelamin--</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>

            <div class="form-group">
              <label>Jabatan</label>
              <select name="jabatan" class="form-control" required="">
                <option value="">--Pilih Jabatan--</option>
                <?php
                  $query = mysqli_query($koneksi, "SELECT * FROM data_jabatan");
                  while ($data = mysqli_fetch_array($query)) {
                    ?>
                      <option value="<?php echo $data['nama_jabatan'] ?>"><?php echo $data['nama_jabatan']; ?></option>
                    <?php
                  }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" required="" name="username" id="username" placeholder="Input Username Karyawan">
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="text" class="form-control" required="" name="password" id="password" placeholder="Input Password Karyawan">
            </div>

            <div class="form-group">
              <label>Hak Akses</label>
              <select name="hak_akses" class="form-control">
                <option value="">--Pilih Hak Akses--</option>
                <option value="Admin">Admin</option>
                <option value="Pegawai">Pegawai</option>
              </select>
            </div>

            <div class="form-group">
              <label for="foto">Foto</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="foto" id="foto">
                  <label class="custom-file-label" for="foto">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
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