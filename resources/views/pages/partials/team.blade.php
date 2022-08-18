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
                    @foreach($users as $user)
                    <div class="col-lg-3 col-md-6">
                        <div class="team-single-wrap mb-5">
                            <div class="team-img rounded-custom">
                                <img src="{{asset('storage/profile-images/'.$user->image)}}" alt="{{$user->name}}" class="img-fluid position-relative">
                                <ul class="list-unstyled team-social-list d-flex flex-column mb-0">
                                    <li class="list-inline-item"><a href="{{$user->linkedIn}}"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="list-inline-item"><a href="{{$user->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="{{$user->github}}"><i class="fab fa-github"></i></a></li>
                                    <li class="list-inline-item"><a href="{{$user->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                            <div class="team-info mt-4 text-center">
                                <h5 class="h6 mb-1">{{$user->name}}</h5>
                                <p class="text-muted small mb-0">{{$user->tagline}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- <div class="col-lg-3 col-md-6">
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
                    </div> -->
                </div>
            </div>
        </section>
        <!--team section end-->