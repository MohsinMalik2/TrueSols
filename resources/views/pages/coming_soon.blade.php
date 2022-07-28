@extends('register.regMaster')

@section('content')
  <!--coming soon section start-->
  <section class="coming-soon-section min-vh-100 ptb-120 overflow-hidden position-relative w-100 d-flex flex-column justify-content-center" style="background: url('assets/img/page-header-bg.svg')no-repeat bottom right">
            <div class="bg-dark fixed-bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-12">
                        <div class="coming-soon-content-wrap position-relative z-2">
                            <a href="index-2.html" class="mb-5 d-block"><img src="assets/img/logo-white.png" alt="logo" class="img-fluid"></a>

                            <h5 class="text-white">We are Coming Soon...</h5>
                            <h1 class="text-white">We are Working Our New Website, Please Stay With us!</h1>
                            <div class="action-btns">
                                <a href="#notify-form" class="btn btn-primary mt-5 popup-with-form">Notify Me!</a>
                            </div>

                            <div class="social-list-wrap mt-100">
                                <ul class="list-unstyled author-social-list social-bg-ts list-inline mb-0">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-github"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--popup form start-->
                <div id="notify-form" class="mfp-hide white-popup-block  rounded-custom bg-white p-5">
                    <div class="subscribe-info-wrap text-center position-relative z-2">
                        <div class="section-heading">
                            <h3>Subscribe for Latest News and Updated!</h3>
                            <p>We can help you to create your dream website for better business revenue.</p>
                        </div>
                        <div class="form-block-banner mw-60 m-auto">
                            <form id="email-form2" name="email-form" class="subscribe-form d-flex">
                                <input type="email" class="form-control me-2" name="Email" data-name="Email" placeholder="Your email" id="Email2" required="">
                                <input type="submit" value="Subscribe!" data-wait="Please wait..." class="btn btn-primary">
                            </form>
                        </div>
                        <ul class="nav justify-content-center subscribe-feature-list mt-3">
                            <li class="nav-item">
                                <span><i class="fad fa-dot-circle text-primary me-2"></i>No credit card required</span>
                            </li>
                            <li class="nav-item">
                                <span><i class="fad fa-dot-circle text-primary me-2"></i>Support 24/7</span>
                            </li>
                            <li class="nav-item">
                                <span><i class="fad fa-dot-circle text-primary me-2"></i>Cancel anytime</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--popup form end-->
            </div>

            <ul class="animated-circle list-unstyled z--1">
                <li class="transition-delay-1 bg-danger"></li>
                <li class="transition-delay-2 bg-warning"></li>
                <li class="transition-delay-3 bg-primary"></li>
            </ul>
        </section>
        <!--coming soon section end-->
@endsection