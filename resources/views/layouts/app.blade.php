<!DOCTYPE html>
<html lang="en">
    <head>
        <!--required meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <!--twitter og-->
        <meta name="twitter:site" content="@buggbear">
        <meta name="twitter:creator" content="@buggbear">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Buggbear - Art of Creation">
        <meta name="twitter:description" content="Buggbear - Art of Creation provides IT solutions & Development services including Web Development, Web Design, CRM, POS, HRM, Graphic Designing, Content Writing, Automated & Mannual Quality Assurance, SEO and UI/UX Design.">
        <meta name="twitter:image" content="{{asset('assets/img/social-banner.png')}}">

        <!--facebook og-->
        <meta property="og:url" content="#">
        <meta name="twitter:title" content="Buggbear - Art of Creation">
        <meta property="og:description" content="Buggbear - Art of Creation provides IT solutions & Development services including Web Development, Web Design, CRM, POS, HRM, Graphic Designing, Content Writing, Automated & Mannual Quality Assurance, SEO and UI/UX Design.">
        <meta property="og:image" content="{{asset('assets/img/fb-trusols-banner.png')}}">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="600">

        <!--meta-->
        <meta name="description" content="Buggbear - Art of Creation provides IT solutions & Development services including Web Development, Web Design, CRM, POS, HRM, Graphic Designing, Content Writing, Automated & Mannual Quality Assurance, SEO and UI/UX Design.">
        <meta name="author" content="ThemeTags">

        <!--favicon icon-->
        <link rel="icon" href="{{asset('assets/img/favicon.png')}}" type="image/png" sizes="16x16">

        <!--title-->
        <title>Buggbear - Art of Creation</title>

        <!--google fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&amp;family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">

        <!--build:css-->
        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
        <!-- endbuild -->

        <!--custom css start-->
        <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
        <!--custom css end-->

    </head>
    <body>
        <!--preloader start-->
        <div id="preloader">
            <div class="preloader-wrap">
                <img src="{{asset('assets/img/loader.png')}}" alt="logo" class="img-fluid preloader-icon" />
                <div class="loading-bar"></div>
            </div>
        </div>
        <!--preloader end-->
        <!--main content wrapper start-->
        <div class="main-wrapper">    
            @include('layouts.header')
            @yield('content')
            @include('layouts.footer')
        </div>

        @include('layouts.scripts')
    </body>
</html>