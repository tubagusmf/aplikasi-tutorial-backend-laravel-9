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
              <li class="breadcrumb-item active">Dashboard</li>
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
                <a href="{{ asset('admin/kategori/tambah') }}" class="btn btn-outline-primary btn-sm float-sm-right"><i class="fas fa-plus"></i> Tambah</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          

          <table class="table table-bordered table-striped" id="example1">
            <thead>
            <tr>
                <th width="5%">NO</th>
                <th width="5%">GAMBAR</th>
                <th width="25%">NAMA KATEGORI</th>
                <th width="25%">SLUG</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            
            <?php $i=1; foreach($kategori as $kategori) { ?>
            
            <tr>
                <td class="text-center"><?php echo $i ?></td>
                <td>
                  <img src="{{ asset('assets/upload/image/thumbs/'.$kategori->gambar) }}" class="img-thumbnail img-size-50 mr-2" alt="">
                </td>
                <td><?php echo $kategori->nama_kategori ?></td>
                <td><?php echo $kategori->slug_kategori ?></td>
                <td>
                  <div class="btn-group">
                    <a href="{{ asset('admin/kategori/edit/'.$kategori->id_kategori) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                    <a href="{{ asset('admin/kategori/delete/'.$kategori->id_kategori) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i> Hapus</a>
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