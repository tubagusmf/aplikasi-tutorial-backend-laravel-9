<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $title }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header row">
            <div class="col-md-4">
                <h3 class="card-title">{{ $title }}</h3>
            </div>
            <div class="col-md-8">
                <a href="{{ asset('admin/user/tambah') }}" class="btn btn-outline-primary btn-sm float-sm-right"><i class="fas fa-plus"></i> Tambah</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          

          <table class="table table-bordered table-striped" id="example1">
            <thead>
            <tr>
                <th width="5%">NO</th>
                <th width="5%">GAMBAR</th>
                <th>NAMA USER</th>
                <th>EMAIL</th>
                <th>USERNAME</th>
                <th>PIC</th>
                <th>URUTAN</th>
                <th>AKSES LEVEL</th>
                <th>AKSI</th>
            </tr>
            </thead>
            <tbody>
            
            <?php $i=1; foreach($user as $user) { ?>
            
            <tr>
                <td class="text-center"><?php echo $i ?></td>
                <td>
                  <img src="{{ asset('assets/upload/image/thumbs/'.$user->gambar) }}" class="img-thumbnail img-size-50 mr-2" alt="">
                </td>
                <td><?php echo $user->nama ?></td>
                <td><?php echo $user->email ?></td>
                <td><?php echo $user->username ?></td>
                <td><?php echo $user->pic ?></td>
                <td><?php echo $user->urutan ?></td>
                <td><?php echo $user->akses_level ?></td>
                <td>
                  <div class="btn-group">
                    <a href="{{ asset('admin/user/edit/'.$user->id_user) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit" title="Edit"></i> </a>
                    <a href="{{ asset('admin/user/delete/'.$user->id_user) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt" title="Hapus"></i> </a>
                  </div>
                </td>
            </tr>
            
            <?php $i++; } ?>
            
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->