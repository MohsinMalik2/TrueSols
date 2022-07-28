@extends('register.regMaster')

@section('content')
<!--register section start-->
<section class="sign-up-in-section bg-dark ptb-60" style="background: url('assets/img/page-header-bg.svg')no-repeat right bottom">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-5 col-md-8 col-12">
                <a href="index-2.html" class="mb-4 d-block text-center"><img src="assets/img/logo-white.png" alt="logo" class="img-fluid"></a>
                <div class="register-wrap p-5 bg-light shadow rounded-custom">
                    <h1 class="h3">Nice to Seeing You Again</h1>
                    <p class="text-muted">Please log in to access your account web-enabled methods of innovative
                        niches.</p>

                    <div class="action-btns">
                        <a href="#" class="btn google-btn bg-white shadow-sm mt-4 d-block d-flex align-items-center text-decoration-none justify-content-center">
                            <img src="assets/img/google-icon.svg" alt="google" class="me-3">
                            <span>Connect with Google</span>
                        </a>
                    </div>
                    <div class="position-relative d-flex align-items-center justify-content-center mt-4 py-4">
                        <span class="divider-bar"></span>
                        <h6 class="position-absolute text-center divider-text bg-light mb-0">Or</h6>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="mt-4 register-form">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="email" class="mb-1">Email <span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-label="email">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label for="password" class="mb-1">Password <span
                                        class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" id="password" name="password" required autocomplete="current-password" aria-label="Password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                    name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mt-3 d-block w-100">Submit</button>
                            </div>
                        </div>
                        <p class="font-monospace fw-medium text-center text-muted mt-3 pt-4 mb-0">Don’t have an
                            account? <a href="register.html" class="text-decoration-none">Sign up Today</a>
                            <br>
                            <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot password</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--register section end-->
@endsection