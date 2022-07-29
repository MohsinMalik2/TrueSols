@extends('register.regMaster')

@section('content')
 <!--register section start-->
 <section class="sign-up-in-section bg-dark ptb-60" style="background: url('assets/img/page-header-bg.svg')no-repeat right bottom">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-5 col-md-8 col-12">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <a href="route('login')" class="mb-4 d-block text-center"><img src="{{asset('assets/img/logo-white.png')}}" alt="logo" class="img-fluid"></a>
                        <div class="register-wrap p-5 bg-light shadow rounded-custom">
                            <h1 class="fw-bold h3">Forgot your Password2 ?</h1>
                            <p class="text-muted">Don't worry. Type your email and we will send a password recovery link to
                                your email..</p>
                               
                            <form method="POST" action="{{ route('password.email') }}" class="mt-5 register-form">
                                 @csrf   
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="email" class="mb-1">Email <span class="text-danger">*</span></label>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-label="email">
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-3 d-block w-100">Reset Password
                                        </button>
                                    </div>
                                </div>
                                <p class="font-monospace fw-medium text-center mt-3 pt-4 mb-0">
                                    <a href="route('login')" class="text-decoration-none">Back to login page</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--register section end-->
@endsection