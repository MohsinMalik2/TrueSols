@extends('layouts.app')

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
                        <!-- <div class="blog-details-wrap">
                            <p>Objectively restore stand-alone markets rather than enterprise-wide products. Uniquely underwhelm best-of-breed mindshare through adaptive niches. Interactively leverage existing innovative e-services seamlessly parallel task open-source content without resource sucking technology.
                            </p>
                            <p>Dramatically cultivate frictionless communities with enterprise-wide customer service. Dramatically simplify web-enabled growth strategies rather than integrated imperatives. Interactively leverage existing innovative e-services customer service. Intrinsicly impact web-enabled value vis-a-vis innovative customer service. Continually procrastinate efficient growth strategies for backend experiences.</p>
                            <div class="blog-details-info mt-5">
                                <h3 class="h5">Customer retention is key</h3>
                                <ul class="content-list list-unstyled">
                                    <li>Be involved in every step of the product design cycle from discovery and user acceptance testing.</li>
                                    <li>Work with BAs, product managers and tech teams to lead the Product Design</li>
                                    <li>Maintain quality of the design process and ensure that when designs are translated into code they accurately.</li>
                                    <li>Accurately estimate design tickets during planning sessions.</li>
                                    <li>Contribute to sketching sessions involving non-designersCreate, and pattern libraries.</li>
                                    <li>Design pixel perfect responsive UI’s and understand that adopting common interface</li>
                                    <li>Interface patterns is better for UX than reinventing the wheel</li>
                                </ul>
                                <blockquote class="bg-white custom-shadow p-5 mt-5 rounded-custom border-4 border-primary border-top">
                                    <p class="text-muted"><i class="fas fa-quote-left me-2 text-primary"></i> Globally network long-term high-impact schemas vis-a-vis distinctive e-commerce
                                        cross-media infrastructures rather than ethical. Credibly visualize distinctive testing procedures without end-to-end ROI. Seamlessly brand cross-platform communities with backend markets. Assertively utilize business services through robust solutions. Rapidiously deliver cross-unit infrastructures rather than accurate metrics.
                                        <i class="fas fa-quote-right ms-2 text-primary"></i>
                                    </p>
                                </blockquote>
                            </div>
                            <img src="assets/img/tab-feature-img-4.png" class="img-fluid mt-4 rounded-custom" alt="apply">
                            <div class="job-details-info mt-5">
                                <h3 class="h5">Focus on increasing customer retention first</h3>
                                <p>Appropriately fashion ubiquitous information without future-proof growth strategies. Interactively morph cutting-edge e-business before functional potentialities. Compellingly syndicate empowered communities via multimedia based schemas. Objectively productize granular materials whereas quality solutions. Collaboratively reinvent innovative paradigms and low-risk high-yield action items.</p>
                                <ul class="content-list list-unstyled">
                                    <li>Interactively plagiarize covalent "outside the box" thinking vis-a-vis.</li>
                                    <li>Holisticly communicate integrated channels via backend interfaces. Authoritatively.
                                    </li>
                                    <li>Globally actualize effective processes through synergistic ROI. Interactively.</li>
                                </ul>
                            </div>

                            <div class="blog-details-info mt-5">
                                <h3 class="h5">Skill & Experience</h3>
                                <ul class="content-list list-unstyled">
                                    <li>You have at least 3 years’ experience working as a Product Designer.</li>
                                    <li>You have experience using Sketch and InVision or Framer X</li>
                                    <li>You have some previous experience working in an agile environment – Think two-week sprints.</li>
                                    <li>You are familiar using Jira and Confluence in your workflow</li>
                                </ul>
                            </div>

                            <img src="assets/img/tab-feature-img-2.png" class="img-fluid mt-5 rounded-custom" alt="apply">
                        </div> -->
                    </div>
                    <div class="col-lg-4">
                        <div class="author-wrap text-center bg-light p-5 sticky-sidebar rounded-custom mt-5 mt-lg-0">
                            <img src="{{asset('storage/profile-images/'.$blog->user->image)}}" alt="author" width="120" class="img-fluid shadow-sm rounded-circle">
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
                                <a href="blog.html" class="btn btn-primary">View All Article</a>
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
                                            <a href="javascript:;" class="d-inline-block text-dark badge bg-danger-soft">{{$blog->category}}</a>
                                            
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
                                                    <img src="{{asset('assets/img/testimonial/6.jpg')}}" alt="avatar" width="40" class="img-fluid rounded-circle me-3">
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