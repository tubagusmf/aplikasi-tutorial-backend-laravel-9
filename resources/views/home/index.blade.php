    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <?php foreach($slider as $slider) { ?>
                <div class="single-slider slider-height d-flex align-items-center flex-fill p-4 fs-3" data-background="{{ asset('assets/upload/image/'.$slider->gambar) }}" style="background-color: rgba(0,0,0,0.7); opacity: 50%">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-8">
                                <div class="hero__caption">
                                    <h5 data-animation="fadeInLeft" data-delay=".4s" style="color : #d66209;">{{ $slider->nama_slider }}</h5>
                                    <h1 data-animation="fadeInLeft" data-delay=".6s" style="color : #d66209;">{{ $slider->keterangan }}</h1>
                                    <!-- Hero-btn -->
                                    {{-- <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                                        <a href="industries.html" class="btn hero-btn">Learn More</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- slider Area End-->

        <!-- Recent Area Start -->
        <div class="recent-area section-paddingt">
            <div class="container">
                <!-- section tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <h2>Tutorial Backend</h2>
                        </div>
                        <div class="blog_right_sidebar mb-10">
                            <aside class="search_widget">
                                <form action="{{ asset('post/cari') }}" method="get">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" name="keywords" class="form-control" placeholder='Cari Kata Kunci...' value="<?php if(isset($_GET['keywords'])) { echo strip_tags($_GET['keywords']); } ?>"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Cari Kata Kunci...'">
                                            <div class="input-group-append">
                                                <button class="btns" type="submit"><i class="ti-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="row mt-100">
                    <?php foreach($post as $post) { ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-1">
                        <div class="single-recent-cap mb-20">
                            <div class="recent-img">
                                <img src="{{ asset('assets/upload/image/thumbs/'.$post->gambar) }}" style="height: 200px; width: 300px;" alt="{{ $post->judul_post }}">
                            </div>
                            <div class="recent-cap">
                                <span><?php echo $post->nama_kategori ?></span>
                                <h4><a href="{{ asset('post/read/'.$post->slug_post) }}">{{ $post->judul_post }}</a></h4>
                                <p><?php echo date('d-m-Y',strtotime($post->tanggal_publish)) ?></p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <a href="{{ asset('post') }}" class="btn btn-danger justify-content-center d-flex">Lihat Lainnya >></a>
                  
                    {{-- <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-recent-cap mb-30">
                            <div class="recent-img">
                                <img src="{{ asset('assets/template') }}/assets/img/recent/rcent_2.png" style="width: 300px; height: 250px;" alt="">
                            </div>
                            <div class="recent-cap">
                                <span>Audit</span>
                                <h4><a href="single-blog.html">Amazing Places To Visit In Summer</a></h4>
                                <p>Nov 30, 2020</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-recent-cap mb-30">
                            <div class="recent-img">
                                <img src="{{ asset('assets/template') }}/assets/img/recent/rcent_3.png" alt="">
                            </div>
                            <div class="recent-cap">
                                <span>Business planing</span>
                                <h4><a href="single-blog.html">Amazing Places To Visit In Summer</a></h4>
                                <p>Nov 30, 2020</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Recent Area End-->

    </main>