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
                <li class="breadcrumb-item active">{{ $title }}</li>
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
                <a href="{{ asset('admin/slider') }}" class="btn btn-success btn-sm float-sm-right">
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
              
              <form action="{{ asset('admin/slider/tambah-proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                {{ csrf_field() }}
                
                <div class="form-group row">
                  <label class="col-md-3 text-right">Nama Slider</label>
                  <div class="col-md-9">
                      <input type="text" class="form-control" name="nama_slider" value="{{ old('nama_slider') }}" placeholder="Nama Slider">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 text-right">Keterangan</label>
                  <div class="col-md-9">
                    <textarea name="keterangan" class="form-control" cols="30" rows="10" placeholder="Keterangan Gambar">{{ old('keterangan') }}</textarea>
                  </div>
                </div>

                <div class="row form-group">
                  <label class="col-md-3 text-right">Upload Gambar Slider</label>
                  <div class="col-md-9">
                    <input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
                  </div>
                </div>
              
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
  
  