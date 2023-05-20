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
                <a href="{{ asset('admin/user') }}" class="btn btn-success btn-sm float-sm-right">
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

        <form action="{{ asset('admin/user/proses-edit') }}" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        {{ csrf_field() }}           
            <div class="form-group row">
                <label class="col-md-3">Nama</label>
                <div class="col-md-9">
                    <input type="hidden" class="form-control" name="id_user" value="{{ $user->id_user }}" placeholder="Nama">
                    <input type="text" class="form-control" name="nama" value="{{ $user->nama }}" placeholder="Nama">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Email</label>
                <div class="col-md-9">
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Username</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="username" value="{{ $user->username }}" placeholder="Username" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Password</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Hak Akses & PIC</label>
                <div class="col-md-4">
                    <select name="akses_level" class="form-control">
                        <option value="Admin">Admin</option>
                        <option value="User" <?php if($user->akses_level=="User") { echo 'selected'; } ?>>User</option>
                    </select>
                    <span class="text-danger">Hak Akses</span>
                </div>
                <div class="col-md-4">
                    <select name="pic" class="form-control">
                        <option value="SPV" <?php if($user->pic=="SPV") { echo 'selected'; } ?>>KCI</option>
                        <option value="KCI" <?php if($user->pic=="KCI") { echo 'selected'; } ?>>KCI</option>
                        <option value="ASDP" <?php if($user->pic=="ASDP") { echo 'selected'; } ?>>ASDP</option>
                        <option value="GRAPARI" <?php if($user->pic=="GRAPARI") { echo 'selected'; } ?>>GRAPARI</option>
                        <option value="TRANSJAKARTA" <?php if($user->pic=="TRANSJAKARTA") { echo 'selected'; } ?>>TRANSJAKARTA</option>
                        <option value="FENITA" <?php if($user->pic=="FENITA") { echo 'selected'; } ?>>FENITA</option>
                        <option value="SITOLAUT" <?php if($user->pic=="SITOLAUT") { echo 'selected'; } ?>>SITOLAUT</option>
                        <option value="MANDIRI" <?php if($user->pic=="MANDIRI") { echo 'selected'; } ?>>MANDIRI</option>
                        <option value="LRT SUMSEL" <?php if($user->pic=="LRT SUMSEL") { echo 'selected'; } ?>>LRT SUMSEL</option>
                    </select>
                    <span class="text-danger">PIC Jabatan</span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Urutan</label>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="urutan" value="{{ $user->urutan }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Whatsapp</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="whatsapp" value="{{ $user->whatsapp }}" placeholder="821********">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3">Gambar</label>
                <div class="col-md-2">
                    <?php if($user->gambar == '') { echo '-'; } else { ?>
                        <img src="{{ asset('assets/upload/image/'. $user->gambar) }}" class="img img-thumbnail">
                    <?php } ?>
                </div>
                <div class="col-md-7">
                    <input type="file" class="form-control" name="gambar" value="{{ $user->gambar }}" placeholder="Gambar">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3"></label>
                <div class="col-md-9">
                    <a href="{{ asset('admin/user') }}" class="btn btn-outline-info">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <button class="btn btn-secondary" type="reset">
                        <i class="fa fa-times"></i> Reset
                    </button>
                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </div>
        </form>
                      
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
</div>
  
  