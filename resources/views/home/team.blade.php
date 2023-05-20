    <main>

        <!-- slider Area Start-->
        <div class="slider-area mb-3">
            <!-- Mobile Menu -->
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="{{ asset('assets/template') }}/assets/img/hero/contact_hero.jpg">
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

        <!-- services Area Start-->
        <div class="services-area section-padding2 pt-2 pb-5">
            <div class="container">
                <!-- section tittle -->
                <div class="row">
                    <?php foreach($team as $team) { ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 mb-1">
                        <div class="single-services text-center mb-30">
                            <div class="testimonial-icon mb-45">
                                <img src="{{ asset('assets/upload/image/thumbs/'.$team->gambar) }}" style="width: 100px; height: 80px;" class="ani-btn " alt="">
                            </div>
                            <div class="services-caption">
                                <h4>{{ $team->nama }}</h4>
                                <p>PIC : {{ $team->pic }}</p>
                                <a href="{{ asset('https://wa.me/62'.$team->whatsapp) }}" target="_blank"><img src="{{ asset('assets/template') }}/assets/img/whatsapp.png" style="widht:50px; height:50px;" title="{{ $team->whatsapp }}"></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <!-- button -->
            </div>
        </div>
        <!-- services Area End-->

    </main>