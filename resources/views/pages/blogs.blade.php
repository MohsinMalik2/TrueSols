@extends('layouts.app')
@section('blogs','active')
@section('page-meta')
<!--twitter og-->
<meta name="twitter:site" content="www.buggbear.com/blogs">
<meta name="twitter:creator" content="Mohsin Nawaz">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Blogs - Buggbear - Art of Creation">
<meta name="twitter:description" content="Buggbear - Art of Creation provides IT solutions & Development services including Web Development, Web Design, CRM, POS, HRM, Graphic Designing, Content Writing, Automated & Mannual Quality Assurance, SEO and UI/UX Design.">
<meta name="twitter:image" content="{{asset('assets/img/social-banner.png')}}">

<!--facebook og-->
<meta property="og:url" content="www.buggbear.com/blogs">
<meta name="twitter:title" content="Blogs - Buggbear - Art of Creation">
<meta property="og:description" content="Buggbear - Art of Creation provides IT solutions & Development services including Web Development, Web Design, CRM, POS, HRM, Graphic Designing, Content Writing, Automated & Mannual Quality Assurance, SEO and UI/UX Design.">
<meta property="og:image" content="{{asset('assets/img/fb-trusols-banner.png')}}">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="600">

<!--meta-->
<meta name="description" content="Buggbear - Art of Creation provides IT solutions & Development services including Web Development, Web Design, CRM, POS, HRM, Graphic Designing, Content Writing, Automated & Mannual Quality Assurance, SEO and UI/UX Design.">
<meta name="author" content="Mohsin Nawaz">

<!--title-->
<title>Blogs - Buggbear</title>

@endsection

@push('style')
<style>
    .btn-soft-primary.active, .btn-outline-primary.active {
    color: var(--bs-white);
    background-color: var(--bs-primary);
    border-color: var(--bs-primary);
}
</style>
@endpush
@section('content')

<!--page header section start-->
<section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('assets/img/page-header-bg.svg')no-repeat center bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="section-heading text-center">
                    <h1 class="display-5 fw-bold">Our Latest News and Blogs</h1>
                    <p class="lead mb-0">Completely integrate equity invested partnerships without revolutionary systems. Monotonectally network pandemic e-services via bricks-and-clicks information. </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-xl-8">
                <div class="tab-button mb-5">
                    <ul class="nav nav-pills d-flex justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class=" btn btn-soft-primary btn-pill btn-sm m-2 active" id="pills-web-tab" data-bs-toggle="pill" data-bs-target="#pills-web" type="button" role="tab" aria-controls="pills-web" aria-selected="true">
                                Website Development
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class=" btn btn-soft-primary btn-pill btn-sm m-2" id="pills-branding-tab" data-bs-toggle="pill" data-bs-target="#pills-branding" type="button" role="tab" aria-controls="pills-branding" aria-selected="false">
                                Brand Development
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class=" btn btn-soft-primary btn-pill btn-sm m-2" id="pills-design-tab" data-bs-toggle="pill" data-bs-target="#pills-design" type="button" role="tab" aria-controls="pills-design" aria-selected="false">
                                UX / UI Design
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class=" btn btn-soft-primary btn-pill btn-sm m-2" id="pills-logo-tab" data-bs-toggle="pill" data-bs-target="#pills-logo" type="button" role="tab" aria-controls="pills-logo" aria-selected="false">
                            Logo / Graphic Design
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-circle rounded-circle circle-shape-3 position-absolute bg-dark-light right-5"></div>
    </div>
</section>
<!--page header section end-->

<!--blog section start-->
<section class="masonary-blog-section ptb-120">
    <div class="container">
        <div class="row">
            <div class="tab-content" id="pills-tabContent"> 
                <!-- Web -->
                <div class="tab-pane fade show active" id="pills-web" role="tabpanel" aria-labelledby="pills-all-tab">
                    <div class="row">
                        @foreach($blogs as $blog)
                            @if($blog->category == 1)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-article rounded-custom my-3">
                                    <a href="{{route('blog-detail', $blog->slug)}}" class="article-img">
                                        <img src="{{asset('storage/blog-images/'.$blog->thumbnail)}}" alt="{{$blog->title}}" class="img-fluid">
                                    </a>
                                    <div class="article-content p-4">
                                        <div class="article-category mb-4 d-block">
                                            <a href="javascript:;" class="d-inline-block text-dark badge bg-danger-soft">
                                                Website Development
                                            </a>
                                        </div>
                                        <a href="{{route('blog-detail', $blog->slug)}}">
                                            <h2 class="h5 article-title limit-2-line-text">{{$blog->title}}</h2>
                                        </a>
                                        <p class="limit-2-line-text">{{$blog->overview}}</p>
                                        <p>
                                            @php
                                            $str = $blog->tags;
                                            $arr = explode(",",$str);
                                            @endphp
                                            @foreach($arr as $tags)
                                            <span class="d-inline-block text-dark badge bg-warning-soft">{{$tags}}</span>
                                            @endforeach
                                        </p>
                                        <a href="javascript:;">
                                            <div class="d-flex align-items-center pt-4">
                                                <div class="avatar">
                                                    <img src="{{asset('storage/profile-images/'.$blog->user->image)}}" alt="{{$blog->user->name}}" width="40" class="img-fluid rounded-circle me-3">
                                                </div>
                                                <div class="avatar-info">
                                                    <h6 class="mb-0 avatar-name">{{$blog->user->name}}</h6>
                                                    <span class="small fw-medium text-muted">{{date("F d, Y", strtotime($blog->created_at))}}</span>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Branding -->
                <div class="tab-pane fade" id="pills-branding" role="tabpanel" aria-labelledby="pills-branding-tab">

                    <div class="row">
                        @foreach($blogs as $blog)
                            @if($blog->category == 2)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-article rounded-custom my-3">
                                    <a href="{{route('blog-detail', $blog->slug)}}" class="article-img">
                                        <img src="{{asset('storage/blog-images/'.$blog->thumbnail)}}" alt="{{$blog->title}}" class="img-fluid">
                                    </a>
                                    <div class="article-content p-4">
                                        <div class="article-category mb-4 d-block">
                                            <a href="javascript:;" class="d-inline-block text-dark badge bg-danger-soft">
                                                Brand Development
                                            </a>
                                        </div>
                                        <a href="{{route('blog-detail', $blog->slug)}}">
                                            <h2 class="h5 article-title limit-2-line-text">{{$blog->title}}</h2>
                                        </a>
                                        <p class="limit-2-line-text">{{$blog->overview}}</p>
                                        <p>
                                            @php
                                            $str = $blog->tags;
                                            $arr = explode(",",$str);
                                            @endphp
                                            @foreach($arr as $tags)
                                            <span class="d-inline-block text-dark badge bg-warning-soft">{{$tags}}</span>
                                            @endforeach
                                        </p>
                                        <a href="javascript:;">
                                            <div class="d-flex align-items-center pt-4">
                                                <div class="avatar">
                                                    <img src="{{asset('storage/profile-images/'.$blog->user->image)}}" alt="{{$blog->user->name}}" width="40" class="img-fluid rounded-circle me-3">
                                                </div>
                                                <div class="avatar-info">
                                                    <h6 class="mb-0 avatar-name">{{$blog->user->name}}</h6>
                                                    <span class="small fw-medium text-muted">{{date("F d, Y", strtotime($blog->created_at))}}</span>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Design -->
                <div class="tab-pane fade" id="pills-design" role="tabpanel" aria-labelledby="pills-design-tab">

                    <div class="row">
                        @foreach($blogs as $blog)
                            @if($blog->category == 3)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-article rounded-custom my-3">
                                    <a href="{{route('blog-detail', $blog->slug)}}" class="article-img">
                                        <img src="{{asset('storage/blog-images/'.$blog->thumbnail)}}" alt="{{$blog->title}}" class="img-fluid">
                                    </a>
                                    <div class="article-content p-4">
                                        <div class="article-category mb-4 d-block">
                                            <a href="javascript:;" class="d-inline-block text-dark badge bg-danger-soft">
                                            UX / UI Design
                                            </a>
                                        </div>
                                        <a href="{{route('blog-detail', $blog->slug)}}">
                                            <h2 class="h5 article-title limit-2-line-text">{{$blog->title}}</h2>
                                        </a>
                                        <p class="limit-2-line-text">{{$blog->overview}}</p>
                                        <p>
                                            @php
                                            $str = $blog->tags;
                                            $arr = explode(",",$str);
                                            @endphp
                                            @foreach($arr as $tags)
                                            <span class="d-inline-block text-dark badge bg-warning-soft">{{$tags}}</span>
                                            @endforeach
                                        </p>
                                        <a href="javascript:;">
                                            <div class="d-flex align-items-center pt-4">
                                                <div class="avatar">
                                                    <img src="{{asset('storage/profile-images/'.$blog->user->image)}}" alt="{{$blog->user->name}}" width="40" class="img-fluid rounded-circle me-3">
                                                </div>
                                                <div class="avatar-info">
                                                    <h6 class="mb-0 avatar-name">{{$blog->user->name}}</h6>
                                                    <span class="small fw-medium text-muted">{{date("F d, Y", strtotime($blog->created_at))}}</span>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Logo -->
                <div class="tab-pane fade" id="pills-logo" role="tabpanel" aria-labelledby="pills-logo-tab">
                    <div class="row">
                        @foreach($blogs as $blog)
                            @if($blog->category == 4)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-article rounded-custom my-3">
                                        <a href="{{route('blog-detail', $blog->slug)}}" class="article-img">
                                            <img src="{{asset('storage/blog-images/'.$blog->thumbnail)}}" alt="{{$blog->title}}" class="img-fluid">
                                        </a>
                                        <div class="article-content p-4">
                                            <div class="article-category mb-4 d-block">
                                                <a href="javascript:;" class="d-inline-block text-dark badge bg-danger-soft">
                                                    Logo / Graphic Design
                                                </a>
                                            </div>
                                            <a href="{{route('blog-detail', $blog->slug)}}">
                                                <h2 class="h5 article-title limit-2-line-text">{{$blog->title}}</h2>
                                            </a>
                                            <p class="limit-2-line-text">{{$blog->overview}}</p>
                                            <p>
                                                @php
                                                $str = $blog->tags;
                                                $arr = explode(",",$str);
                                                @endphp
                                                @foreach($arr as $tags)
                                                <span class="d-inline-block text-dark badge bg-warning-soft">{{$tags}}</span>
                                                @endforeach
                                            </p>
                                            <a href="javascript:;">
                                                <div class="d-flex align-items-center pt-4">
                                                    <div class="avatar">
                                                        <img src="{{asset('storage/profile-images/'.$blog->user->image)}}" alt="{{$blog->user->name}}" width="40" class="img-fluid rounded-circle me-3">
                                                    </div>
                                                    <div class="avatar-info">
                                                        <h6 class="mb-0 avatar-name">{{$blog->user->name}}</h6>
                                                        <span class="small fw-medium text-muted">{{date("F d, Y", strtotime($blog->created_at))}}</span>
                                                    </div>
                                                </div>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!--pagination start-->
        @if($blogs->hasPages())
        <div class="row justify-content-center align-items-center mt-5">
            <div class="col-auto my-1">
                <a href="{{$blogs->previousPageUrl()}}" class="btn btn-soft-primary btn-sm">Previous</a>
            </div>
            <div class="col-auto my-1">
                <nav>
                    <ul class="pagination rounded mb-0">
                        @for($i = 1; $i <= $blogs->lastPage(); $i++)
                            <li class="page-item  @if($blogs->currentPage() == $i) active @endif">
                                <a class="page-link" href="{{$blogs->url($i)}}">{{$i}}</a>
                            </li>
                            @endfor
                    </ul>
                </nav>
            </div>
            <div class="col-auto my-1">

                <a href="{{$blogs->nextPageUrl()}}" class="btn btn-soft-primary btn-sm 
                @if(!$blogs->hasMorePages()) disabled @endif ">Next</a>
            </div>
        </div>
        @endif
        <!--pagination end-->
    </div>
</section>
<!--blog section end-->


@endsection