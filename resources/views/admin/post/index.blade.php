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
                <a href="{{ asset('admin/post/tambah') }}" class="btn btn-outline-primary btn-sm float-sm-right"><i class="fas fa-plus"></i> Tambah</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th></th>
              <th>GAMBAR</th>
              <th>JUDUL</th>
              <th>KATEGORI</th>
              <?php if(Request::segment(3)=="jenis_post") { ?>
              <?php }else{ ?>
              <th>STATUS</th>
              <?php } ?>
              <th>AUTHOR</th>
              <th>AKSI</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($post as $post) { ?>
            <tr>
                <td class="text-center">
                    <div class="icheck-primary">
                      <input type="checkbox" name="id_post[]" value="{{ $post->id_post }}" id="check<?php echo $i ?>">
                      <label for="check<?php echo $i ?>"></label>
                    </div>
                </td>
                <td>
                    <img src="{{ asset('assets/upload/image/thumbs/'.$post->gambar) }}" class="img-thumbnail img-size-50 mr-2" alt="">
                </td>
                <td>
                    <a href="{{ asset('admin/post/edit/'.$post->id_post) }}">
                        <?php echo $post->judul_post ?> <sup><i class="fa fa-pencil"></i></sup>
                    </a>
                    <small>
                            <br>Posted: <?php echo date('d M Y H:i: s',strtotime($post->tanggal_post)) ?>
                            <br>Published: <?php echo date('d M Y H:i: s',strtotime($post->tanggal_publish)) ?>
                            <br>Urutan: <?php echo $post->urutan ?>
                            <br>Tgl posting: <?php echo date('d-m-Y',strtotime($post->tanggal_publish)) ?>
                            <br>Jenis: <a href="{{ asset('admin/post/jenis_post/'.$post->jenis_post) }}">
                        <?php echo $post->jenis_post ?><sup><i class="fa fa-link"></i></sup>
                        </a>
                    </small>
                </td>
                <?php if(Request::segment(3)=="jenis_post") {}else{ ?>
                <td>
                  <a href="{{ asset('admin/post/kategori/'.$post->id_kategori) }}">
                    <?php echo $post->nama_kategori ?><sup><i class="fa fa-link"></i></sup>
                  </a>
                </td>
                <?php } ?>
                <td> 
                    <a href="{{ asset('admin/post/status_post/'.$post->status_post) }}">
                        <small class="badge <?php if($post->status_post=="Publish") { echo 'badge-success'; }else{ echo 'badge-warning'; } ?> btn-block">
                        <i class="fa <?php if($post->status_post=="Publish") { echo 'fa-check-circle'; }else{ echo 'fa-times'; } ?>"></i> <?php echo $post->status_post ?></small>
                    </a>
                </td>
                <td>
                    <?php if(Request::segment(3)=="jenis_post") {echo $post->nama; }else{ ?>
                        <a href="{{ asset('admin/post/author/'.$post->id_user) }}">
                        <?php echo $post->nama ?><sup><i class="fa fa-link"></i></sup>
                        </a>
                    <?php } ?>
                </td>
                <td>
                    <a href="{{ asset('post/read/'.$post->slug_post) }}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye"></i></a>
                    <a href="{{ asset('admin/post/edit/'.$post->id_post) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="{{ asset('admin/post/delete/'.$post->id_post.'/'.$post->jenis_post) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i></a>
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