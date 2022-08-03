@extends('layouts.app')

@section('content')
 <!--about header section start-->
        <section class="about-header-section ptb-120 position-relative overflow-hidden bg-dark" style="background: url('assets/img/page-header-bg.svg')no-repeat center right">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading-wrap d-flex justify-content-between z-5 position-relative">
                            <div class="about-content-left">
                                <div class="about-info mb-5">
                                    <h1 class="fw-bold display-5">Grow your Business & Digital Presence with
                                        Truesols - Digital Agency</h1>
                                    <p class="lead">Dynamically disintermediate technically sound technologies with
                                        compelling quality vectors error-free communities. </p>
                                    <a href="{{route('request-demo')}}" class="btn btn-primary mt-4 me-3">Work With us</a>
                                <a href="{{route('portfolio')}}" class="btn btn-soft-primary mt-4">Our Work</a>
                                </div>
                                <img src="{{asset('assets/img/about-img-1.jpg')}}" alt="about" class="img-fluid about-img-first mt-5 rounded-custom shadow">
                            </div>
                            <div class="about-content-right">
                                <img src="{{asset('assets/img/about-img-2.jpg')}}" alt="about" class="img-fluid mb-5 rounded-custom shadow">
                                <img src="{{asset('assets/img/about-img-3.jpg')}}" alt="about" class="rounded-custom about-img-last shadow">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white position-absolute bottom-0 h-25 bottom-0 left-0 right-0 z-2 py-5">
            </div>
        </section>
        <!--about header section end-->

        <!--our story section start-->
        <section class="our-story-section pt-60 pb-120" style="background: url('assets/img/shape/dot-dot-wave-shape.svg')no-repeat left bottom">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-5 col-md-12 order-lg-1">
                        <div class="section-heading sticky-sidebar">
                            <h4 class="h5 text-primary">Our Story</h4>
                            <h2>A Great Story Starts with a Friendly Relation with the Clients.</h2>
                            <p>We work for the creation of the perfect mixture of elegance and innovation 
                                for each of our clients. Our passion translates into a positive working relationship 
                                that reflects the true secret of our success. 
                                This helps us to maintain our presence and keep us updated on advancements worldwide. </p>
                            <!-- <div class="mt-4">
                                <h6 class="mb-3">We Are Awarded By-</h6>
                                <img src="{{asset('assets/img/awards-01.svg')}}" alt="awards" class="me-4 img-fluid">
                                <img src="{{asset('assets/img/awards-02.svg')}}" alt="awards" class="img-fluid">
                            </div> -->
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 order-lg-0">
                        <div class="story-grid-wrapper position-relative">
                            <!--animated shape start-->
                            <ul class="position-absolute animate-element parallax-element shape-service d-none d-lg-block">
                                <li class="layer" data-depth="0.02">
                                    <img src="{{asset('assets/img/color-shape/image-2.svg')}}" alt="shape" class="img-fluid position-absolute color-shape-2 z-5">
                                </li>
                                <li class="layer" data-depth="0.03">
                                    <img src="{{asset('assets/img/color-shape/feature-3.svg')}}" alt="shape" class="img-fluid position-absolute color-shape-3">
                                </li>
                            </ul>
                            <!--animated shape end-->
                            <div class="story-grid rounded-custom bg-dark overflow-hidden position-relative">
                                <div class="story-item bg-light border">
                                    <h3 class="display-5 fw-bold mb-1 text-success">10+</h3>
                                    <h6 class="mb-0">Ongoing Projects</h6>
                                </div>
                                <div class="story-item bg-white border">
                                    <h3 class="display-5 fw-bold mb-1 text-primary">20+</h3>
                                    <h6 class="mb-0">Team Members</h6>
                                </div>
                                <!-- <div class="story-item bg-white border">
                                    <h3 class="display-5 fw-bold mb-1 text-dark">$20M+</h3>
                                    <h6 class="mb-0">Revenue Per/Year</h6>
                                </div> -->
                                <div class="story-item bg-white border">
                                    <h3 class="display-5 fw-bold mb-1 text-warning">4 Years</h3>
                                    <h6 class="mb-0">In Business</h6>
                                </div>
                                <div class="story-item bg-light border">
                                    <h3 class="display-5 fw-bold mb-1 text-danger">9+</h3>
                                    <h6 class="mb-0">Clients Worldwide</h6>
                                </div>
                                <div class="story-item bg-white border">
                                    <h3 class="display-5 fw-bold mb-1 text-primary">32+</h3>
                                    <h6 class="mb-0">Projects Completed</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--our story section end-->

        <!--feature section two start-->
        <section class="feature-section-two ptb-120 bg-light">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="section-heading">
                            <h4 class="h5 text-primary">Our Values</h4>
                            <h2>The Core Values that Drive Everything</h2>
                            <p>Quickly incubate functional channels with multidisciplinary architectures. Authoritatively
                                fabricate formulate exceptional innovation.</p>
                            <ul class="list-unstyled mt-5">
                                <li class="d-flex align-items-start mb-4">
                                    <div class="icon-box bg-primary rounded me-4">
                                        <i class="fas fa-bezier-curve text-white"></i>
                                    </div>
                                    <div class="icon-content">
                                        <h3 class="h5">Pixel Perfect Design</h3>
                                        <p>Progressively foster enterprise-wide systems whereas equity invested
                                            web-readiness harness installed.
                                        </p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start mb-4">
                                    <div class="icon-box bg-danger rounded me-4">
                                        <i class="fas fa-fingerprint text-white"></i>
                                    </div>
                                    <div class="icon-content">
                                        <h3 class="h5">Clean &amp; well Commented Development</h3>
                                        <p>Dramatically administrate progressive metrics without error-free globally
                                            simplify standardized engineer efficient strategic.
                                        </p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start mb-4">
                                    <div class="icon-box bg-dark rounded me-4">
                                        <i class="fas fa-cog text-white"></i>
                                    </div>
                                    <div class="icon-content">
                                        <h3 class="h5">Efficiency & Accountability</h3>
                                        <p>Objectively transition prospective collaboration and idea-sharing without focused
                                            maintain focused niche markets niches.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <div class="feature-img-wrap position-relative d-flex flex-column align-items-end">
                            <ul class="img-overlay-list list-unstyled position-absolute">
                                <li class="d-flex align-items-center bg-white rounded shadow-sm p-3">
                                    <i class="fas fa-check bg-primary text-white rounded-circle"></i>
                                    <h6 class="mb-0">Request a Demo</h6>
                                </li>
                                <li class="d-flex align-items-center bg-white rounded shadow-sm p-3">
                                    <i class="fas fa-check bg-primary text-white rounded-circle"></i>
                                    <h6 class="mb-0">Schedule a Meeting</h6>
                                </li>
                                <li class="d-flex align-items-center bg-white rounded shadow-sm p-3">
                                    <i class="fas fa-check bg-primary text-white rounded-circle"></i>
                                    <h6 class="mb-0"> Get your Solution </h6>
                                </li>
                            </ul>
                            <img src="{{asset('assets/img/feature-img3.jpg')}}" alt="feature image" class="img-fluid rounded-custom">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--feature section two end-->

        <!--team section start-->
        <section id="our-team" class="team-section ptb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="section-heading text-center">
                            <h5 class="h6 text-primary">Our Team</h5>
                            <h2>The People Behind Our Success</h2>
                            <p>Intrinsicly strategize cutting-edge before interoperable applications incubate extensive
                                expertise through integrated intellectual capital. </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="team-single-wrap mb-5">
                            <div class="team-img rounded-custom">
                                <img src="{{asset('assets/img/team/Mohsin.jpg')}}" alt="team" class="img-fluid position-relative">
                                <ul class="list-unstyled team-social-list d-flex flex-column mb-0">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-github"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                            <div class="team-info mt-4 text-center">
                                <h5 class="h6 mb-1">Mohsin Nawaz</h5>
                                <p class="text-muted small mb-0">Founder | CEO | Software Engineer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-single-wrap mb-5">
                            <div class="team-img rounded-custom">
                                <img src="{{asset('assets/img/team/aliButt.jpg')}}" alt="team" class="img-fluid position-relative">
                                <ul class="list-unstyled team-social-list d-flex flex-column mb-0">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-github"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                            <div class="team-info mt-4 text-center">
                                <h5 class="h6 mb-1">Muhammad Ali Butt</h5>
                                <p class="text-muted small mb-0">Project Manager | Co-Founder </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-single-wrap mb-5">
                            <div class="team-img rounded-custom">
                                <img src="{{asset('assets/img/team/sarmad.jpg')}}" alt="team" class="img-fluid position-relative">
                                <ul class="list-unstyled team-social-list d-flex flex-column mb-0">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-github"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                            <div class="team-info mt-4 text-center">
                                <h5 class="h6 mb-1">Sarmad Iqbal</h5>
                                <p class="text-muted small mb-0">Sr. Quality Assurance (Manual & Automate)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-single-wrap mb-5">
                            <div class="team-img rounded-custom">
                                <img src="{{asset('assets/img/team/hamza.jpg')}}" alt="team" class="img-fluid position-relative">
                                <ul class="list-unstyled team-social-list d-flex flex-column mb-0">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-github"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                            <div class="team-info mt-4 text-center">
                                <h5 class="h6 mb-1">Muhammad Hamza</h5>
                                <p class="text-muted small mb-0">Full Stack Developer | Wordpress Developer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-single-wrap mb-5">
                            <div class="team-img rounded-custom">
                                <img src="{{asset('assets/img/team/hammas.jpg')}}" alt="team" class="img-fluid position-relative">
                                <ul class="list-unstyled team-social-list d-flex flex-column mb-0">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-github"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                            <div class="team-info mt-4 text-center">
                                <h5 class="h6 mb-1">Muhammad Hammas Javed</h5>
                                <p class="text-muted small mb-0">Co-founder | Backend Developer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="team-single-wrap mb-5">
                            <div class="team-img rounded-custom">
                                <img src="{{asset('assets/img/team/aizaz.jpg')}}" alt="team" class="img-fluid position-relative">
                                <ul class="list-unstyled team-social-list d-flex flex-column mb-0">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-github"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                            <div class="team-info mt-4 text-center">
                                <h5 class="h6 mb-1">Syed Aizaz Hassan</h5>
                                <p class="text-muted small mb-0">Sr. Backend Developer | CRM Expert</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--team section end-->
@endsection