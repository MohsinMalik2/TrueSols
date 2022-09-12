@extends('layouts.app')
@section('portfolio','active')
@section('page-meta')
        <!--twitter og-->
        <meta name="twitter:site" content="www.buggbear.com/portfolio">
        <meta name="twitter:creator" content="Mohsin Nawaz">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Our Work - Buggbear - Art of Creation">
        <meta name="twitter:description" content="Buggbear - Art of Creation provides IT solutions & Development services including Web Development, Web Design, CRM, POS, HRM, Graphic Designing, Content Writing, Automated & Mannual Quality Assurance, SEO and UI/UX Design.">
        <meta name="twitter:image" content="{{asset('assets/img/social-banner.png')}}">

        <!--facebook og-->
        <meta property="og:url" content="www.buggbear.com/portfolio">
        <meta name="twitter:title" content="Our Work - Buggbear - Art of Creation">
        <meta property="og:description" content="Buggbear - Art of Creation provides IT solutions & Development services including Web Development, Web Design, CRM, POS, HRM, Graphic Designing, Content Writing, Automated & Mannual Quality Assurance, SEO and UI/UX Design.">
        <meta property="og:image" content="{{asset('assets/img/fb-trusols-banner.png')}}">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="600">

        <!--meta-->
        <meta name="description" content="Buggbear - Art of Creation provides IT solutions & Development services including Web Development, Web Design, CRM, POS, HRM, Graphic Designing, Content Writing, Automated & Mannual Quality Assurance, SEO and UI/UX Design.">
        <meta name="author" content="Mohsin Nawaz">

        <!--title-->
        <title>Our Work - Buggbear</title>

@endsection
@section('content')

        <!--page header section start-->
        <section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('assets/img/page-header-bg.svg')no-repeat center bottom">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12">
                        <div class="section-heading text-center">
                            <h1 class="display-5 fw-bold">Our Latest Projects & Products</h1>
                            <p class="lead mb-0"> We’ve been building unique digital products, platforms, and experiences for the past 6 years.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-circle rounded-circle circle-shape-3 position-absolute bg-dark-light right-5"></div>
            </div>
        </section>
        
        <!-- portfolio start -->
        <section class="portfolio bg-light ptb-120">
            <div class="container">
                
            <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="tab-button mb-5">
                            <ul class="nav nav-pills d-flex justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-web-tab" data-bs-toggle="pill" data-bs-target="#pills-web" type="button" role="tab" aria-controls="pills-web" aria-selected="true">
                                        Web
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-branding-tab" data-bs-toggle="pill" data-bs-target="#pills-branding" type="button" role="tab" aria-controls="pills-branding" aria-selected="false">
                                        Branding
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-design-tab" data-bs-toggle="pill" data-bs-target="#pills-design" type="button" role="tab" aria-controls="pills-design" aria-selected="false">
                                        Design
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-logo-tab" data-bs-toggle="pill" data-bs-target="#pills-logo" type="button" role="tab" aria-controls="pills-logo" aria-selected="false">
                                        Logo
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <!-- All -->
                        <div class="tab-pane fade show active" id="pills-web" role="tabpanel" aria-labelledby="pills-all-tab">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/Carmine.png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Website Design Project</a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Design,</span>
                                                    <span>Web</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/Chapter85.png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Leafery Branding
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Branding,</span>
                                                    <span>Logo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/LinkThrough.png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Information Architencure
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Branding,</span>
                                                    <span>Logo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/CRM.png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">User Interface Design
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Design</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/corium.png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Information Architencure
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Branding,</span>
                                                    <span>Logo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/peak.png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Branding & Corporate Identity
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Branding,</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/ZMEnterprise.png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Leafery Branding
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Branding,</span>
                                                    <span>Logo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/Flamingo.png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Information Architencure
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Branding,</span>
                                                    <span>Logo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($portfolioList as $portfolio)
                                    @if($portfolio->category == 1)
                                        <div class="col-lg-4">
                                            <div class="single-portfolio-item mb-30">
                                                <div class="portfolio-item-img d-flex align-items-center justify-content-center">
                                                    <img src="{{asset('storage/portfolio-images/'.$portfolio->thumbnail)}}" alt="portfolio photo" class="img-fluid" />
                                                    <div class="portfolio-info">
                                                        <h5>
                                                            <a href="{{$portfolio->url}}" class="text-decoration-none text-white">{{$portfolio->name}}</a>
                                                        </h5>
                                                        <div class="categories">
                                                            <?php
                                                            $my_array1 = explode("," , $portfolio->tags)
                                                            ?>
                                                            @foreach($my_array1 as $tag)
                                                                <span>{{$tag}}, </span>
                                                            @endforeach
                                                        </div>
                                                    </div>
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
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/corium-branding.jpg')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">User Interface Design
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Design</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/brand (1).jpg')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">User Interface Design
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Design</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/brand (2).jpg')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">User Interface Design
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Design</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/brand (3).jpg')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">User Interface Design
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Design</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/brand (4).jpg')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">User Interface Design
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Design</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/brand (5).jpg')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">User Interface Design
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Design</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/brand (6).jpg')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">User Interface Design
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Design</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/brand (7).jpg')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">User Interface Design
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Design</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/brand (8).jpg')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">User Interface Design
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Design</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            @foreach($portfolioList as $portfolio)
                                    @if($portfolio->category == 2)
                                        <div class="col-lg-4">
                                            <div class="single-portfolio-item mb-30">
                                                <div class="portfolio-item-img d-flex align-items-center justify-content-center">
                                                    <img src="{{asset('storage/portfolio-images/'.$portfolio->thumbnail)}}" alt="portfolio photo" class="img-fluid" />
                                                    <div class="portfolio-info">
                                                        <h5>
                                                            <a href="{{$portfolio->url}}" class="text-decoration-none text-white">{{$portfolio->name}}</a>
                                                        </h5>
                                                        <div class="categories">
                                                            <?php
                                                            $my_array1 = explode("," , $portfolio->tags)
                                                            ?>
                                                            @foreach($my_array1 as $tag)
                                                                <span>{{$tag}}, </span>
                                                            @endforeach
                                                        </div>
                                                    </div>
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
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/design (3).png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Branding & Corporate Identity
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Branding,</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/design (2).png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Information Architencure
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Branding,</span>
                                                    <span>Logo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/design (1).png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Website Design Project</a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Design,</span>
                                                    <span>Web</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/design (4).png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Branding & Corporate Identity
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Branding,</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($portfolioList as $portfolio)
                                    @if($portfolio->category == 3)
                                        <div class="col-lg-4">
                                            <div class="single-portfolio-item mb-30">
                                                <div class="portfolio-item-img d-flex align-items-center justify-content-center">
                                                    <img src="{{asset('storage/portfolio-images/'.$portfolio->thumbnail)}}" alt="portfolio photo" class="img-fluid" />
                                                    <div class="portfolio-info">
                                                        <h5>
                                                            <a href="{{$portfolio->url}}" class="text-decoration-none text-white">{{$portfolio->name}}</a>
                                                        </h5>
                                                        <div class="categories">
                                                            <?php
                                                            $my_array1 = explode("," , $portfolio->tags)
                                                            ?>
                                                            @foreach($my_array1 as $tag)
                                                                <span>{{$tag}}, </span>
                                                            @endforeach
                                                        </div>
                                                    </div>
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
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/1.png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Website Design Project</a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Design,</span>
                                                    <span>Web</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/3.png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Leafery Branding
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Branding,</span>
                                                    <span>Logo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/2.png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Information Architencure
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Branding,</span>
                                                    <span>Logo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/4.png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Information Architencure
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Branding,</span>
                                                    <span>Logo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/5.png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Information Architencure
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Branding,</span>
                                                    <span>Logo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/6.png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Information Architencure
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Branding,</span>
                                                    <span>Logo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/7.png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Information Architencure
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Branding,</span>
                                                    <span>Logo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="single-portfolio-item mb-30">
                                        <div class="portfolio-item-img">
                                            <img src="{{asset('assets/img/portfolio/8.png')}}" alt="portfolio photo" class="img-fluid" />
                                            <div class="portfolio-info">
                                                <h5>
                                                    <a href="portfolio-single.html" class="text-decoration-none text-white">Information Architencure
                                                    </a>
                                                </h5>
                                                <div class="categories">
                                                    <span>Branding,</span>
                                                    <span>Logo</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($portfolioList as $portfolio)
                                    @if($portfolio->category == 4)
                                        <div class="col-lg-4">
                                            <div class="single-portfolio-item mb-30">
                                                <div class="portfolio-item-img d-flex align-items-center justify-content-center">
                                                    <img src="{{asset('storage/portfolio-images/'.$portfolio->thumbnail)}}" alt="portfolio photo" class="img-fluid" />
                                                    <div class="portfolio-info">
                                                        <h5>
                                                            <a href="{{$portfolio->url}}" class="text-decoration-none text-white">{{$portfolio->name}}</a>
                                                        </h5>
                                                        <div class="categories">
                                                            <?php
                                                            $my_array1 = explode("," , $portfolio->tags)
                                                            ?>
                                                            @foreach($my_array1 as $tag)
                                                                <span>{{$tag}}, </span>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio end -->
@endsection