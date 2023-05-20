
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ $title }} </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/upload/image/thumbs/'.$site_config->logo) }}">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/css/flaticon.css">
            <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/css/slicknav.css">
            <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/css/animate.min.css">
            <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/css/magnific-popup.css">
            <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/css/themify-icons.css">
            <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/css/slick.css">
            <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/css/nice-select.css">
            <link rel="stylesheet" href="{{ asset('assets/template') }}/assets/css/style.css">
   </head>

   <body>

    <?php
        date_default_timezone_set("Asia/jakarta");
    ?>

    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    {{-- <img src="{{ asset('assets') }}/upload/image/nutech.png" alt=""> --}}
                    <img src="{{ asset('assets/upload/image/'.$site_config->logo) }}" alt="Nutech Logo">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->