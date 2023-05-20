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
                {{-- <a href="{{ asset('admin/kategori') }}" class="btn btn-success btn-sm float-sm-right">
                    <i class="fa fa-backward"></i> Kembali
                  </a> --}}
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

            <form action="{{ asset('admin/konfigurasi/proses') }}" method="post" accept-charset="utf-8">
            {{ csrf_field() }}

            <div class="row">
                <input type="hidden" name="id_konfigurasi" value="<?php echo $site->id_konfigurasi ?>">


                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama Website</label>
                        <input type="text" class="form-control" name="namaweb" value="<?php echo $site->namaweb ?>">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Tentang Website</label>
                        <textarea name="tentang" rows="3" class="form-control" id="kontenku" id="isi" placeholder="About Me"><?php echo $site->tentang ?></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Alamat Kantor</label>
                        <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat Kantor"><?php echo $site->alamat ?></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                <h3>Basic information:</h3><hr>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Alamat Email" value="<?php echo $site->email ?>" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="number" name="telepon" placeholder="No Telepon Posko" value="<?php echo $site->telepon ?>" required class="form-control">
                    </div>

                    <br>

                    <div class="form-group btn-group">
                        <input type="submit" name="submit" value="Save Configuration" class="btn btn-success ">
                        <input type="reset" name="reset" value="Reset" class="btn btn-primary ">
                    </div>

                </div>

                <div class="col-md-6">
                <h3>Social Network</h3><hr>

                    <div class="form-group">
                        <label>URL Facebook <i class="fa fa-facebook"></i></label>
                        <input type="text" name="facebook" placeholder="http://facebook.com/namakamu" value="<?php echo $site->facebook ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>URL Instagram <i class="fa fa-instagram"></i></label>
                        <input type="text" name="instagram" placeholder="http://instagram.com/namakamu" value="<?php echo $site->instagram ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>No Whatsapp <i class="fa fa-facebook"></i></label>
                        <input type="text" name="whatsapp" placeholder="+628xxxxxx" value="<?php echo $site->whatsapp ?>" class="form-control">
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
  
  