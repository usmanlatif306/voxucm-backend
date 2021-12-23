@extends('layouts.master')@section('title', 'Login') @section('content')
<!-- breadcrumbs start -->
<section class="breadcrumbs-area pt-200 pb-140 bg-1 bg-blue fix">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title">Login</h2>
                    <ul>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                        <li>login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumbs end -->
<!-- Login -->
<div id="contact" class="contact-area  pt-50 pb-50">
    <div class="container">
        <div class="section-title text-center">
            <h2>Login</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-8 offset-md-2">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {!! session('success') !!}
                    </div>
                    @endif @if(session('error'))
                    <div class="alert alert-danger">
                        {!! session('error') !!}
                    </div>
                    @endif
                </div>

                <div class="card border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('prison.loginuser') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="
                                        col-md-3 col-form-label
                                        text-md-right
                                    ">{{ __("E-Mail Address") }}</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="
                                            form-control
                                            @error('email')
                                            is-invalid
                                            @enderror
                                        " name="email" value="{{ old('email') }}" required autocomplete="email"
                                        autofocus />

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="
                                        col-md-3 col-form-label
                                        text-md-right
                                    ">{{ __("Password") }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="
                                            form-control
                                            @error('password')
                                            is-invalid
                                            @enderror
                                        " name="password" required autocomplete="current-password" />

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                        type="checkbox" name="remember"
                                        id="remember"
                                        {{ old("remember") ? "checked" : "" }}>

                                        <label
                                            class="form-check-label"
                                            for="remember"
                                        >
                                            {{ __("Remember Me") }}
                                        </label>
                                    </div>
                                </div>
                            </div> -->

                            <div class="form-group row mb-0">
                                <div class="col-md-3"></div>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __("Login") }}
                                    </button>

                                    <a class="btn btn-link" href="{{ route('prison.forgetView') }}">
                                        {{ __("Forgot Your Password?") }}
                                    </a>
                                    <a class="btn btn-link pl-0" href="{{ route('prison.register') }}">
                                        {{ __("Create New Account?") }}
                                    </a>
                                    <!-- <hr /> -->
                                    <div class="separator">Or Login With</div>
                                    <div class="text-center">
                                        <a class="btn btn-link pl-0 social-link" href="{{ route('prison.facebook') }}"
                                            title="Login With Facebook">
                                            <!-- {{ __("Login With Facebook") }} -->
                                            <span
                                                class="circle d-flex justify-content-center align-items-center border-primary">
                                                <i class="fab fa-facebook-f text-primary"></i>
                                            </span>

                                        </a>
                                        <a class="btn btn-link social-link" href="{{ route('prison.google') }}"
                                            title="Login With Google">
                                            <!-- {{ __("Login With Google") }} -->
                                            <span
                                                class="circle d-flex justify-content-center align-items-center border-danger">
                                                <i class="fab fa-google text-danger"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>

                            </div>


                        </form>
                    </div>

                </div>
                <!-- <div class="col-3"></div>
                <div class="col-9 d-flex">
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ url('authorized/google') }}">
                            <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                                style="margin-left: 3em;">
                        </a>
                    </div>
                    <div class="d-flex items-center justify-content-end mt-4">
                        <a class="ml-1 btn btn-primary" href="{{ url('auth/facebook') }}"
                            style="margin-top: 0px !important;background: blue;color: #ffffff;padding: 5px;border-radius:7px;"
                            id="btn-fblogin">
                            <i class="fa fa-facebook-square" aria-hidden="true"></i> Login with Facebook
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- Login End -->
@endsection