@extends('layouts.app')

@section('content')

        <!--hero section start-->
        <section class="hero-it-solution hero-nine-bg ptb-120" style="background: url('assets/img/hero-9-img.png') no-repeat center center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="hero-content-wrap mt-5 mt-lg-0 mt-xl-0">
                            <h1 class="fw-bold display-5">Your Idea, Our Solution. </h1>
                            <p class="lead">
                                The thing of filling your idea with Power and Passion is our speciality.
                                We are a full-service digital agency, designing and building 
                                beautiful digital products and experiences.
                            </p>
                            <div class="action-btn mt-5 align-items-center d-block d-sm-flex d-lg-flex d-md-flex">
                                <a href="{{route('request-demo')}}" class="btn btn-primary me-3">Work With us</a>
                                <a href="{{route('portfolio')}}" class="btn btn-outline-primary me-3">Our Work</a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-img position-relative mt-5 mt-lg-0">
                            <img src="{{asset('assets/img/banner_image.png')}}" alt="hero hero-it-solution " class="img-fluid" />
                            <div class="dots">
                                <img src="{{asset('assets/img/banner_dot.png')}}" alt="dot" class="dot-1" />
                                <img src="{{asset('assets/img/banner_dot.png')}}" alt="dot" class="dot-2" />
                            </div>
                            <div class="bubble">
                                <span class="bubble-1"></span>
                                <span class="bubble-2"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--hero section end-->

        <!-- About Start -->
        <section class="ptb-120 bg-dark">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-left text-lg-center mb-32 mb-lg-0">
                            <img src="{{asset('assets/img/about.jpg')}}" alt="" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-right">
                            <h4 class="text-primary h5 mb-3">Why Choose Us</h4>
                            <h2 class="mb-4">
                                We are working with <br />
                                3+ years of exprience
                            </h2>
                            <p>
                                We work for the creation of the perfect mixture of elegance 
                                and innovation for each of our clients. Our passion translates 
                                into a positive working relationship that reflects the true secret of our success.
                                This helps us to maintain our presence and keep us updated on advancements worldwide.
                            </p>
                            <h4 class="text-primary h5 mb-3">We Provide</h4>


                            <ul class="list-unstyled d-flex flex-wrap list-two-col mt-4 mb-4">
                                <li class="py-1">
                                    <i class="fad fa-check-circle me-2 text-primary"></i>
                                    Web Development
                                </li>
                                <li class="py-1">
                                    <i class="fad fa-check-circle me-2 text-primary"></i>
                                    Desktop Application Development
                                </li>
                                <li class="py-1">
                                    <i class="fad fa-check-circle me-2 text-primary"></i>
                                    POS Solutions 
                                </li>
                                <li class="py-1">
                                    <i class="fad fa-check-circle me-2 text-primary"></i>
                                    Software Development
                                </li>
                                <li class="py-1">
                                    <i class="fad fa-check-circle me-2 text-primary"></i>
                                    CRM Solutions
                                </li>
                                <li class="py-1">
                                    <i class="fad fa-check-circle me-2 text-primary"></i>
                                    Graphic Designing
                                </li>
                                <li class="py-1">
                                    <i class="fad fa-check-circle me-2 text-primary"></i>
                                    Content Writing
                                </li>
                                <li class="py-1">
                                    <i class="fad fa-check-circle me-2 text-primary"></i>
                                    Quality Assurance
                                </li>
                                <li class="py-1">
                                    <i class="fad fa-check-circle me-2 text-primary"></i>
                                    Search Engine Optimization
                                </li>
                                <li class="py-1">
                                    <i class="fad fa-check-circle me-2 text-primary"></i>
                                    Website Maintenance
                                </li>
                            </ul>
                            <a href="{{route('about-us')}}" class="link-with-icon text-decoration-none mt-3 btn btn-primary">
                                Learn More
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About End -->


       <!-- app two feature three start -->
        <section class="services-icon ptb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="section-heading text-center">
                            <h2>Services We Provide</h2>
                            <p>
                                We’ve been building unique digital products, platforms, and experiences 
                                for the past 3+ years with more than 32 projects.
                            </p>
                        </div>
                        ,
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 p-0">
                        <div class="single-service p-lg-5 p-4 text-center mt-3 border-bottom border-end">
                            <div class="service-icon icon-center">
                                <img src="{{asset('assets/img/service/coding.png')}}" alt="service icon" width="65" height="65" />
                            </div>
                            <div class="service-info-wrap">
                                <h3 class="h5">Web Development</h3>
                                <p>
                                    Web development can range from developing a simple single static page of plain 
                                    text to complex web applications,
                                    electronic businesses, and social network services.
                                    And that's what we do.
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-0">
                        <div class="single-service p-lg-5 p-4 text-center mt-3 border-bottom border-end">
                            <div class="service-icon icon-center">
                                <img src="{{asset('assets/img/service/app-development.png')}}" alt="service icon" width="65" height="65" />
                            </div>
                            <div class="service-info-wrap">
                                <h3 class="h5">Search Engine Optimization</h3>
                                <p>
                                    Our SEO expert team in Buggbear, has the latest techniques of on-page & off-page SEO. 
                                    With our SEO Services we will make sure to drive fast and durable results with a long lasting
                                    effect.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-0">
                        <div class="single-service p-lg-5 p-4 text-center mt-3 border-bottom">
                            <div class="service-icon icon-center">
                                <img src="{{asset('assets/img/service/shield.png')}}" alt="service icon" width="65" height="65" />
                            </div>
                            <div class="service-info-wrap">
                                <h3 class="h5">Quality Assurance</h3>
                                <p>
                                    Buggbear is trained to give 100% tailored and magnified QA solutions to 
                                    provide top-notch apps and softwares, ready to set the market on fire by using latest
                                    automation techniques and tools.

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-0">
                        <div class="single-service p-lg-5 p-4 text-center border-end">
                            <div class="service-icon icon-center">
                                <img src="{{asset('assets/img/service/curve.png')}}" alt="service icon" width="65" height="65" />
                            </div>
                            <div class="feature-info-wrap">
                                <h3 class="h5">UI/UX Design</h3>
                                <p>
                                    Designing an interface is an art of giving a life to your dreams and the platform's realness and 
                                    validity significantly rely upon how well your platform's architecture acts before the Visitor.
                                    And here in Buggbear we have the best architecture and dream builders.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-0">
                        <div class="single-service p-lg-5 p-4 text-center border-end">
                            <div class="service-icon icon-center">
                                <img src="{{asset('assets/img/service/graphic-design.png')}}" alt="service icon" width="65" height="65" />
                            </div>
                            <div class="feature-info-wrap">
                                <h3 class="h5">Graphics Design</h3>
                                <p>
                                    Graphic designing is conveying craftsmanship for the first visual discernment. 
                                    Required Service for the organization’s prosperity and serious edge in the market. 
                                    Our team has propensity power, logical way to deal with sketch customer’s perceptions.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-0">
                        <div class="single-service p-lg-5 p-4 text-center">
                            <div class="service-icon icon-center">
                                <img src="{{asset('assets/img/service/promotion.png')}}" alt="service icon" width="65" height="65" />
                            </div>
                            <div class="feature-info-wrap">
                                <h3 class="h5">Digital Marketing</h3>
                                <p>
                                    We are in this field with 3+ years experience. We have launched more than 14 businesses
                                    including brands from scratch to 6 digits gross profit.
                                    And we know exactly what it takes to build a brand from the scratch and take it to the moon .
                                </p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
         <!-- app two feature three end -->

        <!-- portfolio start -->
        <section class="portfolio bg-light ptb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="section-heading text-center">
                            <h2>Our Portfolio</h2>
                            <p>
                                We’ve been building unique digital products, platforms, and experiences for the past 4 years.
                            </p>
                        </div>
                    </div>
                </div>
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
                <div class="row justify-content-center">
                    <div class="text-center mt-5">
                        <a href="{{route('portfolio')}}" class="btn btn-primary">View All Products</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio end -->

        <!-- app two customer review start -->
        <section class="brand-logo ptb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-10">
                        <div class="section-heading text-center">
                            <h2>Companies Trusted Us</h2>
                            <p>It's not about the quantity but about the quality of work.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <ul class="brand-logo-grid list-unstyled">
                        <li class="d-flex align-items-center">
                            <img src="{{asset('assets/img/brand-logo/1-2.png')}}" alt="brand logo" class="w-100" />
                        </li>
                        <li class="d-flex align-items-center">
                            <img src="{{asset('assets/img/brand-logo/2-1.png')}}" alt="brand logo" class="w-100" />
                        </li>
                        <li class="d-flex align-items-center">
                            <img src="{{asset('assets/img/brand-logo/3-1.png')}}" alt="brand logo" class="w-100" />
                        </li>
                        <li class="d-flex align-items-center">
                            <img src="{{asset('assets/img/brand-logo/corium.png')}}" alt="brand logo" class="w-100" />
                        </li>
                        <li class="d-flex align-items-center">
                            <img src="{{asset('assets/img/brand-logo/indoor-air-quality.png')}}" alt="brand logo" class="w-100" />
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- app two customer review end -->

        <!--Testimonial  price -->
        <!-- Price Two Start-->
            <!-- <section class="price-two ptb-120  bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="section-heading text-center">
                            <h2>
                                Get our any Service <br />
                  With Suitable Pricing
                            </h2>
                            <p>
                                Credibly grow premier ideas rather than bricks-and-clicks strategic
                                theme areas distributed for stand-alone web-readiness.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="position-relative single-pricing-wrap rounded-custom bg-white custom-shadow p-5 mb-4 mb-lg-0">
                            <div class="pricing-header mb-32">
                                <h3 class="package-name text-primary d-block">Stater</h3>
                                <h4 class="display-6 fw-semi-bold">$29<span>/month</span></h4>
                            </div>
                            <div class="pricing-info mb-4">
                                <ul class="pricing-feature-list list-unstyled">
                                    <li>
                                        <i class="far fa-check-circle text-success me-2"></i>Create
                                        Unique Websites
                                    </li>
                                    <li>
                                        <i class="far fa-check-circle text-success me-2"></i>
                                        Automate Your Busy Work
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle text-muted me-2"></i>
                                        Optimize All Your Efforts
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle text-muted me-2"></i>
                                        Centralized Teams
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle text-muted me-2"></i>
                                        Shareable Team Libraries
                                    </li>
                                </ul>
                            </div>
                            <a href="request-demo.html" class="btn btn-outline-primary mt-2">Get Started Now</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="position-relative single-pricing-wrap rounded-custom bg-gradient text-white p-5 mb-4 mb-lg-0">
                            <div class="pricing-header mb-32">
                                <h3 class="package-name text-warning d-block">Advanced</h3>
                                <h4 class="display-6 fw-semi-bold">$49<span>/month</span></h4>
                            </div>
                            <div class="pricing-info mb-4">
                                <ul class="pricing-feature-list list-unstyled">
                                    <li>
                                        <i class="far fa-check-circle text-success me-2"></i>Create
                                        Unique Websites
                                    </li>
                                    <li>
                                        <i class="far fa-check-circle text-success me-2"></i>
                                        Automate Your Busy Work
                                    </li>
                                    <li>
                                        <i class="far fa-check-circle text-success me-2"></i>
                                        Optimize All Your Efforts
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle text-muted me-2"></i>
                                        Centralized Teams
                                    </li>
                                    <li>
                                        <i class="far fa-times-circle text-muted me-2"></i>
                                        Shareable Team Libraries
                                    </li>
                                </ul>
                            </div>
                            <a href="request-demo.html" class="btn btn-primary mt-2">Get Started Now</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="position-relative single-pricing-wrap rounded-custom bg-white custom-shadow p-5 mb-4 mb-lg-0">
                            <div class="pricing-header mb-32">
                                <h3 class="package-name text-primary d-block">Premium</h3>
                                <h4 class="display-6 fw-semi-bold">$69<span>/month</span></h4>
                            </div>
                            <div class="pricing-info mb-4">
                                <ul class="pricing-feature-list list-unstyled">
                                    <li>
                                        <i class="far fa-check-circle text-success me-2"></i>
                                        Create Unique Websites
                                    </li>
                                    <li>
                                        <i class="far fa-check-circle text-success me-2"></i>
                                        Automate Your Busy Work
                                    </li>
                                    <li>
                                        <i class="far fa-check-circle text-success me-2"></i>
                                        Optimize All Your Efforts
                                    </li>
                                    <li>
                                        <i class="far fa-check-circle text-success me-2"></i> Video
                                        Centralized Teams
                                    </li>
                                    <li>
                                        <i class="far fa-check-circle text-success me-2"></i> 40
                                        Shareable Team Libraries
                                    </li>
                                </ul>
                            </div>
                            <a href="request-demo.html" class="btn btn-outline-primary mt-2">Get Started Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Price Two End -->
        <!-- Testimonial end -->

        <!--cat subscribe start-->
        <!-- <section class="cta-subscribe bg-dark text-white ptb-120 position-relative overflow-hidden">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="subscribe-info-wrap text-center position-relative z-2">
                            <div class="section-heading" data-aos="fade-up">
                                <h4 class="h5 text-warning">Let's Try! Get Free Support</h4>
                                <h2>Start Your 14-Day Free Trial</h2>
                                <p>We can help you to create your dream website for better business revenue.</p>
                            </div>
                            <div class="form-block-banner mw-60 m-auto mt-5" data-aos="fade-up" data-aos-delay="50">
                                <a href="contact-us.html" class="btn btn-primary">Contact with Us</a>
                                
                            </div>
                            <ul class="nav justify-content-center subscribe-feature-list mt-4" data-aos="fade-up" data-aos-delay="100">
                                <li class="nav-item">
                                    <span><i class="far fa-check-circle text-primary me-2"></i>Free 14-day trial</span>
                                </li>
                                <li class="nav-item">
                                    <span><i class="far fa-check-circle text-primary me-2"></i>No credit card required</span>
                                </li>
                                <li class="nav-item">
                                    <span><i class="far fa-check-circle text-primary me-2"></i>Support 24/7</span>
                                </li>
                                <li class="nav-item">
                                    <span><i class="far fa-check-circle text-primary me-2"></i>Cancel anytime</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-circle rounded-circle circle-shape-3 position-absolute bg-dark-light left-5"></div>
                <div class="bg-circle rounded-circle circle-shape-1 position-absolute bg-warning right-5"></div>
            </div>
        </section> -->
        <!--cat subscribe end-->

        <!--blog section start-->
        <section class="home-blog-section ptb-120 ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="section-heading text-center">
                            <h4 class="text-primary h5">Blog</h4>
                            <h2>Our Latest News and Update</h2>
                            <p>Assertively maximize cost effective methods of iterate team driven manufactured products through equity invested via customized benefits. </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-article rounded-custom mb-4 mb-lg-0">
                            <a href="blog-single.html" class="article-img">
                                <img src="{{asset('assets/img/blog/blog-1.jpg')}}" alt="article" class="img-fluid">
                            </a>
                            <div class="article-content p-4">
                                <div class="article-category mb-4 d-block">
                                    <a href="javascript:;" class="d-inline-block text-dark badge bg-warning-soft">Design</a>
                                </div>
                                <a href="blog-single.html">
                                    <h2 class="h5 article-title limit-2-line-text">Do you really understand the concept of product value?</h2>
                                </a>
                                <p class="limit-2-line-text">Society is fragmenting into two parallel realities. In one reality, you have infinite upside and opportunity. In the other reality, you’ll continue to see the gap between your standard of living and those at the top grow more and more.</p>

                                <a href="javascript:;">
                                    <div class="d-flex align-items-center pt-4">
                                        <div class="avatar">
                                            <img src="{{asset('assets/img/testimonial/6.jpg')}}" alt="avatar" width="40" class="img-fluid rounded-circle me-3">
                                        </div>
                                        <div class="avatar-info">
                                            <h6 class="mb-0 avatar-name">Jane Martin</h6>
                                            <span class="small fw-medium text-muted">April 24, 2021</span>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-article rounded-custom mb-4 mb-lg-0">
                            <a href="blog-single.html" class="article-img">
                                <img src="{{asset('assets/img/blog/blog-2.jpg')}}" alt="article" class="img-fluid">
                            </a>
                            <div class="article-content p-4">
                                <div class="article-category mb-4 d-block">
                                    <a href="javascript:;" class="d-inline-block text-dark badge bg-primary-soft">Customer</a>
                                </div>
                                <a href="blog-single.html">
                                    <h2 class="h5 article-title limit-2-line-text">Why communities help you build better products for your business</h2>
                                </a>
                                <p class="limit-2-line-text">Society is fragmenting into two parallel realities. In one reality, you have infinite upside and opportunity. In the other reality, you’ll continue to see the gap between your standard of living and those at the top grow more and more.</p>

                                <a href="javascript:;">
                                    <div class="d-flex align-items-center pt-4">
                                        <div class="avatar">
                                            <img src="{{asset('assets/img/testimonial/1.jpg')}}" alt="avatar" width="40" class="img-fluid rounded-circle me-3">
                                        </div>
                                        <div class="avatar-info">
                                            <h6 class="mb-0 avatar-name">Veronica P. Byrd</h6>
                                            <span class="small fw-medium text-muted">April 24, 2021</span>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-article rounded-custom mb-4 mb-lg-0 mb-md-0">
                            <a href="blog-single.html" class="article-img">
                                <img src="{{asset('assets/img/blog/blog-3.jpg')}}" alt="article" class="img-fluid">
                            </a>
                            <div class="article-content p-4">
                                <div class="article-category mb-4 d-block">
                                    <a href="javascript:;" class="d-inline-block text-dark badge bg-danger-soft">Development</a>
                                </div>
                                <a href="blog-single.html">
                                    <h2 class="h5 article-title limit-2-line-text">Why communities help you build better products</h2>
                                </a>
                                <p class="limit-2-line-text">Society is fragmenting into two parallel realities. In one reality, you have infinite upside and opportunity. In the other reality, you’ll continue to see the gap between your standard of living and those at the top grow more and more.</p>

                                <a href="javascript:;">
                                    <div class="d-flex align-items-center pt-4">
                                        <div class="avatar">
                                            <img src="{{asset('assets/img/testimonial/3.jpg')}}" alt="avatar" width="40" class="img-fluid rounded-circle me-3">
                                        </div>
                                        <div class="avatar-info">
                                            <h6 class="mb-0 avatar-name">Martin Gilbert</h6>
                                            <span class="small fw-medium text-muted">April 24, 2021</span>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                    @foreach($blogList as $blog)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-article rounded-custom mb-4 mb-lg-0">
                                <a href="blog-single.html" class="article-img">
                                    <img src="{{asset('storage/blog-images/'.$blog->thumbnail)}}" alt="article" class="img-fluid">
                                </a>
                                <div class="article-content p-4">
                                    <div class="article-category mb-4 d-block">
                                            <a href="javascript:;" class="d-inline-block text-dark badge bg-warning-soft">{{$blog->category}}</a>
                                        
                                    </div>
                                    <a href="blog-single.html">
                                        <h2 class="h5 article-title limit-2-line-text">{{$blog->title}}</h2>
                                    </a>
                                    @php
                                        $text = $blog->content;
                                        $new_text = substr($text, 0 , 15);
                                    @endphp
                                    {{$new_text}}</p>

                                    <a href="javascript:;">
                                        <div class="d-flex align-items-center pt-4">
                                            <div class="avatar">
                                                <img src="{{asset('assets/img/testimonial/6.jpg')}}" alt="avatar" width="40" class="img-fluid rounded-circle me-3">
                                            </div>
                                            <div class="avatar-info">
                                                <h6 class="mb-0 avatar-name">Jane Martin</h6>
                                                <span class="small fw-medium text-muted">April 24, 2021</span>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    <div class="text-center mt-5">
                        <a href="blog.html" class="btn btn-primary">View All Article</a>
                    </div>
                </div>
            </div>
        </section>
        <!--blog section end-->
@endsection