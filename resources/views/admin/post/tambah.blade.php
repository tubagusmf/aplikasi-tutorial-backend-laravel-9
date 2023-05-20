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
                <li class="breadcrumb-item active">Tambah Post</li>
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
                <a href="{{ asset('admin/post') }}" class="btn btn-success btn-sm float-sm-right">
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
              
              <form action="{{ asset('admin/post/tambah-proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
              {{ csrf_field() }}
              <div class="row form-group">
                <label class="col-md-3 text-right">Judul atau Nama</label>
                <div class="col-md-6">
                  <input type="text" name="judul_post" class="form-control form-control-lg" placeholder="Judul <?php if(isset($_GET['jenis_post'])) { echo $_GET['jenis_post']; }else{ echo 'Post'; } ?>" required="required" value="{{ old('judul_post') }}">
                </div>
              </div>
              <?php if(isset($_GET['jenis_post'])) { ?>
              <input type="hidden" name="jenis_post" value="<?php echo $_GET['jenis_post'] ?>">
              <input type="hidden" name="id_kategori" value="0">
              <?php }else{ ?>
              <div class="row form-group">
                <label class="col-md-3 text-right">Kategori</label>
                <div class="col-md-6">
                  <select name="id_kategori" class="form-control select2">
                   <?php foreach($kategori as $kategori) { ?>
                     <option value="<?php echo $kategori->id_kategori ?>"><?php echo $kategori->nama_kategori ?></option>
                   <?php } ?>
                  </select>
                  <small class="text-success">Kategori konten</small>
                </div>
              </div>
              <input type="hidden" name="jenis_post" value="Post">
              <?php } ?>
              
              <div class="row form-group">
                <label class="col-md-3 text-right">Upload Gambar &amp; File</label>
                <div class="col-md-4">
                  <input type="file" name="gambar" class="form-control" placeholder="Upload Gambar">
                </div>
                <div class="col-md-4">
                  <input type="file" name="file" class="form-control" placeholder="Upload File">
                </div>
              </div>
              
              {{-- <div class="row form-group">
                <label class="col-md-3 text-right">Keywords dan Ringkasan<br>(untuk pencarian Google)</label>
                <div class="col-md-6">
                  <textarea name="keywords" class="form-control" placeholder="Keywords (untuk pencarian Google)">{{ old('keywords') }}</textarea>
                </div>
              </div> --}}
              
              <div class="row form-group">
                <label class="col-md-3 text-right">Isi</label> 
                <div class="col-md-9">
                  <textarea name="isi" class="form-control" id="kontenku" placeholder="Isi post">{{ old('isi') }}</textarea>
                </div>
              </div>
              
              <div class="row form-group">
                <label class="col-md-3 text-right">Status, Tanggal &amp; Jam Publish</label>
                <div class="col-md-2">
                  <select name="status_post" class="form-control select2">
                    <option value="Publish">Publikasikan</option>
                    <option value="Draft">Simpan sebagai draft</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <input type="text" name="tanggal_publish" class="form-control tanggal" placeholder="Tanggal publikasi" value="<?php if(isset($_POST['tanggal_publish'])) { echo old('tanggal_publish'); }else{ echo date('d-m-Y'); } ?>" data-date-format="dd-mm-yyyy">
                </div>
                <div class="col-md-2">
                  <input type="text" name="jam_publish" class="form-control time-picker" placeholder="Jam publikasi" value="<?php if(isset($_POST['jam_publish'])) { echo old('jam_publish'); }else{ echo date('H:i:s'); } ?>">
                </div>
              </div>
              
              {{-- <div class="row form-group">
                <label class="col-md-3 text-right">Icon</label>
                <div class="col-md-6">
                  <input type="text" name="icon" class="form-control" placeholder="Icon post/profil/layanan" value="{{ old('icon') }}">
                  <small class="text-success">Icon menggunakan Fontawesome. Kunjungi <a href="https://fontawesome.com/" target="_blank">https://fontawesome.com/</a></small>
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
  
  