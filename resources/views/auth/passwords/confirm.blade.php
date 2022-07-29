<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->


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
                            <h1 class="fw-bold h3">Confirm Password</h1>
                            <p class="text-muted">Please confirm your password before continuing..</p>
                               
                            <form method="POST" action="{{ route('password.confirm') }}" class="mt-5 register-form">
                                 @csrf   
                                 <input type="hidden" name="token" value="{{ $token }}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="company" class="mb-1">Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-3 d-block w-100">Confirm Password
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