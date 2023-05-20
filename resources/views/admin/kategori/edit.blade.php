<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              {{-- <h1>{{ $title }}</h1> --}}
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Kategori</li>
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
                <a href="{{ asset('admin/kategori') }}" class="btn btn-success btn-sm float-sm-right">
                    <i class="fa fa-backward"></i> Kembali
                  </a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              
              <form action="{{ asset('admin/kategori/edit-proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                {{ csrf_field() }}
                
                <div class="form-group row">
                  <label class="col-md-3 text-right">Nama Kategori</label>
                  <div class="col-md-9">
                      <input type="hidden" class="form-control" name="id_kategori" value="{{ $kategori->id_kategori }}">
                      <input type="text" class="form-control" name="nama_kategori" value="{{ $kategori->nama_kategori }}" placeholder="Nama Kategori">
                  </div>
                </div>

                {{-- <div class="form-group row">
                    <label class="col-md-3 text-right">urutan</label>
                    <div class="col-md-9">
                        <input type="number" class="form-control" name="urutan" value="{{ $kategori->urutan }}">
                    </div>
                </div> --}}

                <div class="form-group row">
                    <label class="col-md-3 text-right">Gambar</label>
                    <div class="col-md-2">
                        <?php if($kategori->gambar == '') { echo '-'; } else { ?>
                            <img src="{{ asset('assets/upload/image/'. $kategori->gambar) }}" class="img img-thumbnail">
                        <?php } ?>
                    </div>
                    <div class="col-md-7">
                        <input type="file" class="form-control" name="gambar" value="{{ $kategori->gambar }}" placeholder="Gambar">
                    </div>
                </div>

                {{-- <div class="row form-group">
                  <label class="col-md-3 text-right">Upload gambar &amp; Urutan</label>
                  <div class="col-md-3">
                    <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
                  </div>
                  <div class="col-md-3">
                    <input type="number" name="urutan" class="form-control" placeholder="Urutan" value="{{ old('urutan') }}">
                  </div>
                </div> --}}
              
              <div class="row form-group">
                <label class="col-md-3 text-right"></label>
                <div class="col-md-9">
                  <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-success "><i class="fa fa-save"></i> Simpan Data</button>
                    <input type="reset" name="reset" class="btn btn-info " value="Reset">
                  </div>
                </div>
              </div>
            </form>           
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
</div>
  
  