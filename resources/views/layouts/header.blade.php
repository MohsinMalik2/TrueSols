  <!--header section start-->
    @if(Route::current()->getName() == 'index')
        <header class="main-header position-absolute w-100">
    @else
        <header class="main-header  w-100">
    @endif
          <nav class="navbar navbar-expand-xl navbar-light sticky-header">
              <div class="container d-flex align-items-center justify-content-lg-between position-relative">
                  <a href="{{route('index')}}" class="navbar-brand d-flex align-items-center mb-md-0 text-decoration-none">
                      <img src="{{asset('assets/img/logo-white.png')}}" alt="logo" class="img-fluid logo-white" width="200" />
                      <img src="{{asset('assets/img/logo-color.png')}}" alt="logo" class="img-fluid logo-color" width="200" />
                  </a>

                  <a class="navbar-toggler position-absolute right-0 border-0" href="#offcanvasWithBackdrop" role="button">
                      <span class="far fa-bars" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"></span>
                  </a>
                  <div class="clearfix"></div>
                  <div class="collapse navbar-collapse justify-content-center">
                      <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                          <li class="">
                              <a class="nav-link active" href="{{route('index')}}" role="button">
                                  Home
                              </a>
                          </li>
                          <li><a href="{{ route('services') }}" class="nav-link">Services</a></li>

                          <li><a href="{{route('blogs')}}" class="nav-link">Blogs</a></li>

                          <li><a href="{{route('about-us')}}" class="nav-link">About Us</a></li>

                          <li><a href="{{route('contact-us')}}" class="nav-link">Contact Us</a></li>
                          @guest
                            @if (Route::has('login'))
                                <li>
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li>
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                      </ul>
                  </div>

                  <div class="action-btns text-end me-5 me-lg-0 d-none d-md-block d-lg-block">
                      <a href="{{route('request-demo')}}" class="btn btn-primary">Get Started</a>
                  </div>
                  

                  <!--offcanvas menu start-->
                  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasWithBackdrop">
                      <div class="offcanvas-header d-flex align-items-center mt-4">
                          <a href="{{route('index')}}" class="d-flex align-items-center mb-md-0 text-decoration-none">
                              <img src="{{asset('assets/img/logo-color.png')}}" alt="logo" class="img-fluid ps-2" width="200" />
                          </a>
                          <button type="button" class="close-btn text-danger" data-bs-dismiss="offcanvas" aria-label="Close">
                              <i class="far fa-close"></i>
                          </button>
                      </div>
                      <div class="offcanvas-body">
                          <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                              <li class="">
                                  <a class="nav-link active" href="{{route('index')}}" role="button">
                                      <span class="demo-list bg-primary rounded text-white fw-bold">H</span> Home
                                  </a>
                              </li>
                              <li>
                                  <a href="{{route('services')}}" class="nav-link">
                                      <span class="demo-list bg-primary rounded text-white fw-bold">S</span>
                                      Services
                                  </a>
                              </li>

                              <li>
                                  <a href="{{route('blogs')}}" class="nav-link">
                                      <span class="demo-list bg-primary rounded text-white fw-bold">B</span>
                                      Blogs
                                  </a>
                              </li>

                              <li>
                                  <a href="{{route('about-us')}}" class="nav-link">
                                      <span class="demo-list bg-primary rounded text-white fw-bold">A</span>
                                      About Us
                                  </a>
                              </li>

                              <li>
                                  <a href="{{route('contact-us')}}" class="nav-link">
                                      <span class="demo-list bg-primary rounded text-white fw-bold">C</span>
                                      Contact Us
                                  </a>
                              </li>

                          </ul>
                          <div class="action-btns mt-4 ps-3">
                              <a href="{{route('request-demo')}}" class="btn btn-primary">Get Started</a>
                          </div>
                      </div>
                  </div>
                  <!--offcanvas menu end-->
              </div>
          </nav>
      </header>
      <!--header section end-->