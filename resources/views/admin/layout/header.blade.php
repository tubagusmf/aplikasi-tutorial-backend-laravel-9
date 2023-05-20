<?php 
    $site_config = DB::table('konfigurasi')->first();
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    
      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('assets/upload/image/'.$site_config->logo) }}" alt="Nutech Logo" height="150" width="350">
      </div>
    
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link text-success" href="">
                <i class="fa fa-lock"></i> <?php echo Session()->get('nama'); ?> (<?php echo Session()->get('akses_level'); ?>)
                </a>
            </li>

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link text-danger" href="{{ asset('login/logout') }}">
                <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.navbar -->