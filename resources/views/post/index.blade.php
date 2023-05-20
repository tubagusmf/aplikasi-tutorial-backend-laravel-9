<main>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('assets/template')}}/assets/img/hero/services_hero.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>{{ $title }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <?php foreach($post as $post) { ?>
                        <article class="blog_item">
                            {{-- <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ asset('assets/upload/image/thumbs/'.$post->gambar) }}" alt="{{ $post->judul_post }}">                              
                            </div> --}}
                            <div class="blog_details">
                                <a class="d-inline-block" href="{{ asset('post/read/'.$post->slug_post) }}">
                                    <h2>{{ $post->judul_post }}</h2>
                                </a>
                                <p><?php echo Str::limit(strip_tags($post->isi), 100, $end='...') ?></p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-tag"></i> {{ $post->nama_kategori }}</a></li>
                                    <li><a href="#"><i class="fa fa-calendar-alt"></i> <?php echo date('d-m-Y',strtotime($post->tanggal_publish)) ?></a></li>
                                </ul>
                            </div>
                        </article>

                        <?php } ?>

                        <nav class="blog-pagination justify-content-center d-flex">
                            {{ $posts->links() }}
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
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
                                {{-- <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button> --}}
                            </form>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

</main>