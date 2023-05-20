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
                <div class="col-lg-12 posts-list">
                    <div class="single-post">
                       {{-- <div class="feature-img">
                          <img class="img-fluid" src="{{ asset('assets/upload/image/thumbs/'.$read->gambar) }}" style="width: 50%" alt="">
                       </div> --}}
                       <div class="blog_details">
                          <h2>{{ $read->judul_post }}
                          </h2>
                          <ul class="blog-info-link mt-3 mb-4">
                             <li><a href="#"><i class="fa fa-tag"></i> {{ $read->nama_kategori }}</a></li>
                             <li><a href="#"><i class="fa fa-calendar-alt"></i> <?php echo date('d-m-Y',strtotime($read->tanggal_publish)) ?></a></li>
                          </ul>
                          <?php echo $read->isi; ?>
                          {{-- <a href="{{ asset('assets/upload/file/ViewerJS/'.$read->file) }}"> --}}
                            <iframe src="{{ asset('assets/upload/file/'.$read->file) }}" width="1000" height="800"></iframe>
                       </div>
                    </div>
                 </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

</main>