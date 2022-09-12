@extends('layouts.app')
@section('page-meta')

       
        

        <!--meta-->
        <title>{{$blog->title}}</title>

        <meta name="description" content="{{$blog->overview}}"/>
        <meta name="author" content="{{$blog->user->name}}">
        
        <!--twitter og-->
        <meta name="twitter:site" content="{{route('blog-detail', $blog->id)}}">
        <meta name="twitter:creator" content="{{$blog->user ->name}}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{$blog->title}}">
        <meta name="twitter:description" content="{{$blog->overview}}">
        <meta name="twitter:image" content="{{asset('storage/blog-images/'.$blog->thumbnail)}}">

        <!--facebook og-->
        <meta property="og:url" content="{{route('blog-detail', $blog->id)}}">
        <meta name="twitter:title" content="{{$blog->title}}">
        <meta property="og:description" content="{{$blog->overview}}">
        <meta property="og:image" content="{{asset('storage/blog-images/'.$blog->thumbnail)}}">
        <meta property="og:image:type" content="image">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="600">

       

@endsection
@section('content')
 <!--page header section start-->
 <section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('assets/img/page-header-bg.svg')no-repeat bottom left">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-12">
                        <h1 class="fw-bold display-5">{{$blog->title}}</h1>
                    </div>
                </div>
                <div class="bg-circle rounded-circle circle-shape-3 position-absolute bg-dark-light right-5"></div>
            </div>
        </section>
        <!--page header section end-->

        <!--blog details section start-->
        <section class="blog-details ptb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-8 pe-lg-5">
                        <div class="blog-details-wrap">
                            @include('pages.partials.blog-details')
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="author-wrap text-center bg-light p-5 sticky-sidebar rounded-custom mt-5 mt-lg-0">
                            <img src="{{asset('storage/profile-images/'.$blog->user->image)}}" alt="{{$blog->user->name}}" width="120" class="img-fluid shadow-sm rounded-circle">
                            <div class="author-info my-4">
                                <h5 class="mb-0">{{$blog->user->name}}</h5>
                                <span class="small">{{$blog->user->tagline}}</span>
                            </div>
                            <p>{{$blog->user->content}}</p>
                            <ul class="list-unstyled author-social-list list-inline mt-3 mb-0">
                                <li class="list-inline-item"><a href="{{$blog->user->linkedIn}}"><i class="fab fa-linkedin-in"></i></a></li>
                                <li class="list-inline-item"><a href="{{$blog->user->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="{{$blog->user->github}}"><i class="fab fa-github"></i></a></li>
                                <li class="list-inline-item"><a href="{{$blog->user->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--blog details section end-->

        <!--related blog start-->
        @if(count($blogList) != 0)
            <section class="related-blog-list ptb-120 bg-light">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-4 col-md-12">
                            <div class="section-heading">
                                <h4 class="h5 text-primary">Related News</h4>
                                <h2>More Latest News and Blog at Quiety</h2>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="text-start text-lg-end mb-4 mb-lg-0 mb-xl-0">
                                <a href="{{route('blogs')}}" class="btn btn-primary">View All Article</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($blogList as $blog)
                            <div class="col-lg-4 col-md-6 my-2">
                                <div class="single-article rounded-custom mb-4 mb-lg-0">
                                    <a href="{{route('blog-detail', $blog->id)}}" class="article-img">
                                        <img src="{{asset('storage/blog-images/'.$blog->thumbnail)}}" alt="article" class="img-fluid">
                                    </a>
                                    <div class="article-content p-4">
                                        <div class="article-category mb-4 d-block">
                                            <a href="javascript:;" class="d-inline-block text-dark badge bg-danger-soft">{{$blog->categoryList->name}}</a>
                                            
                                        </div>
                                        <a href="{{route('blog-detail', $blog->id)}}">
                                            <h2 class="h5 article-title limit-2-line-text">{{$blog->title}}</h2>
                                        </a>
                                    
                                        <p>{{$blog->overview}}</p>
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
                                                    <img src="{{asset('storage/profile-images/'.$blog->user->image)}}" alt="avatar" width="40" class="img-fluid rounded-circle me-3">
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
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!--related blog end-->
@endsection