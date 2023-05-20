<?php 
    $site_config = DB::table('konfigurasi')->first();
?>

<header>
    <!-- Header Start -->
   <div class="header-area">
        <div class="main-header ">
            <div class="header-top top-bg d-none d-lg-block" style="background-color: #fd7e14">
               <div class="container-fluid">
                   <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>     
                                    <li><i class="fas fa-user"></i>Selamat Datang <?php echo Session()->get('nama'); ?></li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">    
                                    <li class="text-white"><?php echo date('D d/m/Y'); ?> <span id="jam" style="font-size:20" class="text-white"></span></li>
                                    {{-- <li><a href="{{ asset('login/logout') }}"><i class="fas fa-sign-out-alt"></i></a></li> --}}
                                </ul>
                            </div>
                        </div>
                   </div>
               </div>
            </div>
           <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-1 col-md-1">
                            <div class="logo">
                              <a href="{{ asset('home') }}"><img src="{{ asset('assets/upload/image/thumbs/'.$site_config->logo) }}" style="width:150px; height:70px;" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav> 
                                    <ul id="navigation">                                                                                                                                     
                                        <li><a href="{{ asset('home') }}">Home</a></li>
                                        <li><a href="{{ asset('home/tentang') }}">Tentang Kami</a></li>
                                        <li><a href="{{ asset('kategori') }}">Tutorial</a></li>
                                        <li><a href="{{ asset('home/team') }}">Team Backend</a></li>
                                        <li><a href="{{ asset('login/logout') }}"><i class="fa fa-sign-out-alt" title="Logout"></i> </a></li>
                                        {{-- <li><a href="blog.html">Blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Blog Details</a></li>
                                            </ul>
                                        </li> --}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
   </div>
    <!-- Header End -->
</header>