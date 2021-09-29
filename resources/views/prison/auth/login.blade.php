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
<div id="contact" class="contact-area bg-light pt-50 pb-50">
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

                <div class="card">
                    <div class="card-body">
                        <form
                            method="POST"
                            action="{{ route('prison.loginuser') }}"
                        >
                            @csrf

                            <div class="form-group row">
                                <label
                                    for="email"
                                    class="
                                        col-md-4 col-form-label
                                        text-md-right
                                    "
                                    >{{ __("E-Mail Address") }}</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        type="email"
                                        class="
                                            form-control
                                            @error('email')
                                            is-invalid
                                            @enderror
                                        "
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        autocomplete="email"
                                        autofocus
                                    />

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="password"
                                    class="
                                        col-md-4 col-form-label
                                        text-md-right
                                    "
                                    >{{ __("Password") }}</label
                                >

                                <div class="col-md-6">
                                    <input
                                        id="password"
                                        type="password"
                                        class="
                                            form-control
                                            @error('password')
                                            is-invalid
                                            @enderror
                                        "
                                        name="password"
                                        required
                                        autocomplete="current-password"
                                    />

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
                                <div class="col-md-8 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        {{ __("Login") }}
                                    </button>

                                    <a
                                        class="btn btn-link"
                                        href="{{ route('prison.forgetView') }}"
                                    >
                                        {{ __("Forgot Your Password?") }}
                                    </a>
                                    <a
                                        class="btn btn-link"
                                        href="{{ route('prison.register') }}"
                                    >
                                        {{ __("Sign Up?") }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login End -->
@endsection
