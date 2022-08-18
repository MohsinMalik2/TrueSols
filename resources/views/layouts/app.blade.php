<!DOCTYPE html>
<html lang="en">
    <head>
        <!--required meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

     

        @yield('page-meta')

        <!--favicon icon-->
        <link rel="icon" href="{{asset('assets/img/favico/favicon.ico')}}" type="image/x-icon" >

        <link rel="apple-touch-icon" sizes="57×57" href="{{asset('assets/img/favico/apple-touch-icon.png')}}" type="image/png">
        <link rel="apple-touch-icon" sizes="72×72"  href="{{asset('assets/img/favico/apple-touch-icon.png')}}" type="image/png">
        <link rel="apple-touch-icon" sizes="114×114"  href="{{asset('assets/img/favico/apple-touch-icon.png')}}" type="image/png">
        <link rel="apple-touch-icon" sizes="144×144"  href="{{asset('assets/img/favico/apple-touch-icon.png')}}" type="image/png">

        <link rel="icon" type="image/png" href="{{asset('assets/img/favico/android-chrome-512x512.png')}}" sizes=512x512>
        <link rel="icon" type="image/png" href="{{asset('assets/img/favico/android-chrome-192x192.png')}}" sizes=192x192>

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