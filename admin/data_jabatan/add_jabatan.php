<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Data Jabatan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="?page=data_jabatan">Data Jabatan</a></li>
              <li class="breadcrumb-item active">Tambah Data Jabatan</li>
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
          <h3 class="card-title">Tambah Data Jabatan</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="?page=add_jabatan_act" method="POST">
          <div class="card-body">
            <div class="form-group">
              <label for="nama_jabatan">Nama Jabatan</label>
              <input type="text" class="form-control" required="" name="nama_jabatan" id="nama_jabatan" placeholder="Input Nama Jabatan">
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