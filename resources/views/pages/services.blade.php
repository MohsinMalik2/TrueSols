@extends('layouts.app')
@section('page-meta')
        <!--twitter og-->
        <meta name="twitter:site" content="www.buggbear.com/services">
        <meta name="twitter:creator" content="Mohsin Nawaz">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Our Services - Buggbear - Art of Creation">
        <meta name="twitter:description" content="Buggbear - Art of Creation provides IT solutions & Development services including Web Development, Web Design, CRM, POS, HRM, Graphic Designing, Content Writing, Automated & Mannual Quality Assurance, SEO and UI/UX Design.">
        <meta name="twitter:image" content="{{asset('assets/img/social-banner.png')}}">

        <!--facebook og-->
        <meta property="og:url" content="www.buggbear.com/services">
        <meta name="twitter:title" content="Our Services - Buggbear - Art of Creation">
        <meta property="og:description" content="Buggbear - Art of Creation provides IT solutions & Development services including Web Development, Web Design, CRM, POS, HRM, Graphic Designing, Content Writing, Automated & Mannual Quality Assurance, SEO and UI/UX Design.">
        <meta property="og:image" content="{{asset('assets/img/fb-trusols-banner.png')}}">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="600">

        <!--meta-->
        <meta name="description" content="Buggbear - Art of Creation provides IT solutions & Development services including Web Development, Web Design, CRM, POS, HRM, Graphic Designing, Content Writing, Automated & Mannual Quality Assurance, SEO and UI/UX Design.">
        <meta name="author" content="Mohsin Nawaz">

        <!--title-->
        <title>Our Services - Buggbear</title>

@endsection
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

@include('pages.partials.testimonials')

@endsection