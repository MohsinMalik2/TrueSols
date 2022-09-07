<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
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
        <meta name="author" content="Mohsin Nawaz">

        <!--title-->
        <title>Dashboard - Buggbear Admin</title>

        <!--favicon icon-->
        <link rel="icon" href="{{asset('assets/img/favico/favicon.ico')}}" type="image/x-icon" >

        <link rel="apple-touch-icon" sizes="57×57" href="{{asset('assets/img/favico/apple-touch-icon.png')}}" type="image/png">
        <link rel="apple-touch-icon" sizes="72×72"  href="{{asset('assets/img/favico/apple-touch-icon.png')}}" type="image/png">
        <link rel="apple-touch-icon" sizes="114×114"  href="{{asset('assets/img/favico/apple-touch-icon.png')}}" type="image/png">
        <link rel="apple-touch-icon" sizes="144×144"  href="{{asset('assets/img/favico/apple-touch-icon.png')}}" type="image/png">

        <link rel="icon" type="image/png" href="{{asset('assets/img/favico/android-chrome-512x512.png')}}" sizes=512x512>
        <link rel="icon" type="image/png" href="{{asset('assets/img/favico/android-chrome-192x192.png')}}" sizes=192x192>


     <!-- BEGIN: Vendor CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/toastr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/editors/quill/katex.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/editors/quill/quill.snow.css')}}">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/horizontal-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/charts/chart-apex.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/extensions/ext-component-toastr.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-file-uploader.css')}}">

    <!-- END: Page CSS-->
    @yield('styles')

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">
    @include('admin-layouts.header')
    
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @include('admin-layouts.footer')

    @include('admin-layouts.scripts')

    @yield('scripts')
</body>
<!-- END: Body-->

</html>