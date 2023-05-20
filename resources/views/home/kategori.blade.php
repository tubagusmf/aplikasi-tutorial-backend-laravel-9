    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('assets/template') }}/assets/img/hero/services_hero.jpg">
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

        <!-- Recent Area Start -->
        <div class="recent-area section-padding">
            <div class="container">
                <!-- section tittle -->
                <div class="row">
                    <?php foreach($kategori as $kategori) { ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-1">
                        <div class="single-recent-cap mb-3">
                            <div class="recent-img">
                                <img src="{{ asset('assets/upload/image/thumbs/'.$kategori->gambar) }}" style="height: 200px; width: 300px;">
                            </div>
                            <div class="recent-cap">
                                <h4><a href="{{ asset('post/kategori/'.$kategori->slug_kategori) }}">{{ Str::words($kategori->nama_kategori,4) }}</a></h4>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- Recent Area End-->

    </main>