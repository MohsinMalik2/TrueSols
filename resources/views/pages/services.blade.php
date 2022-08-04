@extends('layouts.app')

@section('content')
<!--page header section start-->
<section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('assets/img/page-header-bg.svg') no-repeat bottom left">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <h1 class="display-5 fw-bold">We are Development Experts</h1>
                <p class="lead">Seamlessly actualize client-based users after out-of-the-box value. Globally embrace
                    strategic data through frictionless expertise.</p>
            </div>
        </div>
        <div class="bg-circle rounded-circle circle-shape-3 position-absolute bg-dark-light right-5"></div>
    </div>
</section>
<!--page header section end-->

<!--features grid section start-->
<section class="feature-section bg-light ptb-120">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="feature-grid">
                    <div class="feature-card bg-white shadow-sm highlight-card rounded-custom p-5">
                        <div class="icon-box d-inline-block rounded-circle bg-primary-soft mb-32">
                            <i class="fal fa-code icon-sm text-primary"></i>
                        </div>
                        <div class="feature-content">
                            <h3 class="h5">Competitive Development</h3>
                            <p>Synergistically pursue accurate initiatives without economically sound
                                imperatives.</p>
                            <p> Professionally architect unique process improvements via optimal.</p>
                            <h6 class="mt-4">Included with...</h6>
                            <ul class="list-unstyled mb-0">
                                <li class="py-1"><i class="fad fa-check-circle me-2 text-primary"></i>
                                    Latest Technologies
                                </li>
                                <li class="py-1"><i class="fad fa-check-circle me-2 text-primary"></i>
                                    Efficient Techniques
                                </li>
                                <li class="py-1"><i class="fad fa-check-circle me-2 text-primary"></i>
                                    SEO Friendly
                                </li>
                                <li class="py-1"><i class="fad fa-check-circle me-2 text-primary"></i>
                                    Clean and well Commented
                                </li>
                                <li class="py-1"><i class="fad fa-check-circle me-2 text-primary"></i>
                                    Custom Design
                                </li>
                                <li class="py-1"><i class="fad fa-check-circle me-2 text-primary"></i>
                                    Fully Responsive
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="feature-card bg-white shadow-sm rounded-custom p-5">
                        <div class="icon-box d-inline-block rounded-circle bg-success-soft mb-32">
                            <i class="fal fa-file-chart-line icon-sm text-success"></i>
                        </div>
                        <div class="feature-content">
                            <h3 class="h5">Automated Reports</h3>
                            <p class="mb-0">Synergistically pursue accurate initiatives without economically
                                imperatives.</p>
                        </div>

                    </div>
                    <div class="feature-card bg-white shadow-sm rounded-custom p-5">
                        <div class="icon-box d-inline-block rounded-circle bg-danger-soft mb-32">
                            <i class="fal fa-user-friends icon-sm text-danger"></i>
                        </div>
                        <div class="feature-content">
                            <h3 class="h5">Process Flow</h3>
                            <p class="mb-0">Quickly productize prospective value before collaborative benefits.</p>
                        </div>

                    </div>
                    <div class="feature-card bg-white shadow-sm rounded-custom p-5">
                        <div class="icon-box d-inline-block rounded-circle bg-dark-soft mb-32">
                            <i class="fal fa-spell-check icon-sm text-dark"></i>
                        </div>
                        <div class="feature-content">
                            <h3 class="h5">Automated Testing</h3>
                            <p class="mb-0">Credibly disintermediate functional processes for team driven
                                action.</p>
                        </div>

                    </div>
                    <div class="feature-card bg-white shadow-sm rounded-custom p-5">
                        <div class="icon-box d-inline-block rounded-circle bg-warning-soft mb-32">
                            <i class="fal fa-cog icon-sm text-warning"></i>
                        </div>
                        <div class="feature-content">
                            <h3 class="h5">Easy Customization</h3>
                            <p class="mb-0">Dynamically develop ubiquitous opportunities whereas relationships.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--features grid section end-->

<!--testimonial section start-->
<section class="testimonial-section ptb-120">
    <div class="container">
        <div class="row justify-content-center align-content-center">
            <div class="col-md-10 col-lg-6">
                <div class="section-heading text-center">
                    <h4 class="h5 text-primary">Testimonial</h4>
                    <h2>What They Say About Us</h2>
                    <p>We are what our clients describe. Client's satisfaction is our first priority, right suggestions come next.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="position-relative w-100">
                    <div class="swiper-container testimonialSwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide border border-2 p-5 rounded-custom position-relative">
                                <img src="assets/img/testimonial/quotes-dot.svg" alt="quotes" width="100" class="img-fluid position-absolute left-0 top-0 z--1 p-3">
                                <div class="d-flex mb-32 align-items-center">
                                    <img src="assets/img/testimonial/1.jpg" class="img-fluid me-3 rounded" width="60" alt="user">
                                    <div class="author-info">
                                        <h6 class="mb-0">Muhammad Kashif</h6>
                                        <small>Reg. Manager Mylive-Tech Pakistan</small>
                                    </div>
                                </div>
                                <blockquote>
                                    <h6>The Best Team One Can Hire Remotely!</h6>
                                    Remote work is kinda challenging but the team with right knowledge and collaboration skills,
                                    ace in that field. 100% recommended.
                                </blockquote>
                                <ul class="review-rate mb-0 mt-2 list-unstyled list-inline">
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                </ul>
                                <img src="assets/img/testimonial/quotes.svg" alt="quotes" class="position-absolute right-0 bottom-0 z--1 pe-4 pb-4">
                            </div>
                            <div class="swiper-slide border border-2 p-5 rounded-custom position-relative">
                                <img src="assets/img/testimonial/quotes-dot.svg" alt="quotes" width="100" class="img-fluid position-absolute left-0 top-0 z--1 p-3">
                                <div class="d-flex mb-32 align-items-center">
                                    <img src="assets/img/testimonial/3.jpg" class="img-fluid me-3 rounded" width="60" alt="user">
                                    <div class="author-info">
                                        <h6 class="mb-0">Muhammad Hamza</h6>
                                        <small>IoT Research Officer, Australia</small>
                                    </div>
                                </div>
                                <blockquote>
                                    <h6>Highly Co-operative Agency.</h6>
                                    Thank you very much for doing everything in such a short notice,
                                    I doubted someone will be able to make it with blured specifications I had, but you did it
                                    better than my expectations.
                                </blockquote>
                                <ul class="review-rate mb-0 mt-2 list-unstyled list-inline">
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                </ul>
                                <img src="assets/img/testimonial/quotes.svg" alt="quotes" class="position-absolute right-0 bottom-0 z--1 pe-4 pb-4">
                            </div>
                            <!-- <div class="swiper-slide border border-2 p-5 rounded-custom position-relative">
                                <img src="assets/img/testimonial/quotes-dot.svg" alt="quotes" width="100" class="img-fluid position-absolute left-0 top-0 z--1 p-3">
                                <div class="d-flex mb-32 align-items-center">
                                    <img src="assets/img/testimonial/2.jpg" class="img-fluid me-3 rounded" width="60" alt="user">
                                    <div class="author-info">
                                        <h6 class="mb-0">Mr.Rupan Oberoi</h6>
                                        <small>Founder and CEO</small>
                                    </div>
                                </div>
                                <blockquote>
                                    <h6>Amazing Quiety template!</h6>
                                    Appropriately negotiate interactive niches rather than parallel strategic theme
                                    incubate premium total linkage areas.
                                </blockquote>
                                <ul class="review-rate mb-0 mt-2 list-unstyled list-inline">
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                </ul>
                                <img src="assets/img/testimonial/quotes.svg" alt="quotes" class="position-absolute right-0 bottom-0 z--1 pe-4 pb-4">
                            </div>
                            <div class="swiper-slide border border-2 p-5 rounded-custom position-relative">
                                <img src="assets/img/testimonial/quotes-dot.svg" alt="quotes" width="100" class="img-fluid position-absolute left-0 top-0 z--1 p-3">
                                <div class="d-flex mb-32 align-items-center">
                                    <img src="assets/img/testimonial/4.jpg" class="img-fluid me-3 rounded" width="60" alt="user">
                                    <div class="author-info">
                                        <h6 class="mb-0">Joan Dho</h6>
                                        <small>Founder and CTO</small>
                                    </div>
                                </div>
                                <blockquote>
                                    <h6>Best Template for SAAS Company!</h6>
                                    Dynamically create innovative core competencies with effective best
                                    practices promote innovative infrastructures.
                                </blockquote>
                                <ul class="review-rate mb-0 mt-2 list-unstyled list-inline">
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                </ul>
                                <img src="assets/img/testimonial/quotes.svg" alt="quotes" class="position-absolute right-0 bottom-0 z--1 pe-4 pb-4">
                            </div>
                            <div class="swiper-slide border border-2 p-5 rounded-custom position-relative">
                                <img src="assets/img/testimonial/quotes-dot.svg" alt="quotes" width="100" class="img-fluid position-absolute left-0 top-0 z--1 p-3">
                                <div class="d-flex mb-32 align-items-center">
                                    <img src="assets/img/testimonial/5.jpg" class="img-fluid me-3 rounded" width="60" alt="user">
                                    <div class="author-info">
                                        <h6 class="mb-0">Ranu Mondal</h6>
                                        <small>Lead Developer</small>
                                    </div>
                                </div>
                                <blockquote>
                                    <h6>It is undeniably good!</h6>
                                    Rapidiously supply client-centric e-markets and maintainable processes
                                    progressively engineer
                                </blockquote>
                                <ul class="review-rate mb-0 mt-2 list-unstyled list-inline">
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                </ul>
                                <img src="assets/img/testimonial/quotes.svg" alt="quotes" class="position-absolute right-0 bottom-0 z--1 pe-4 pb-4">
                            </div> -->
                        </div>
                    </div>
                    <span class="swiper-button-next"></span>
                    <span class="swiper-button-prev"></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!--testimonial section end-->
@endsection