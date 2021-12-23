@extends('layouts.master')@section('title', 'Forget-Password')
@section('content')
<!-- breadcrumbs start -->
<section class="breadcrumbs-area pt-200 pb-140 bg-1 bg-blue fix">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title">reset password</h2>
                    <ul>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                        <li>reset password</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumbs end -->
<!-- Forget Password-->
<div id="contact" class="contact-area pt-50 pb-50">
    <div class="container">
        <div class="section-title text-center">
            <h2>{{ __("Reset Password") }}</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-8 offset-md-2">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {!! session('error') !!}
                    </div>
                    @endif
                </div>
                <div class="card border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('prison.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}" />

                            <div class="form-group row">
                                <label for="email" class="
                                        col-md-4 col-form-label
                                        text-md-right
                                    ">{{ __("E-Mail Address") }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="
                                            form-control
                                            @error('email')
                                            is-invalid
                                            @enderror
                                        " name="email" value="{{ $email ?? old('email') }}" required
                                        autocomplete="email" readonly />

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="
                                        col-md-4 col-form-label
                                        text-md-right
                                    ">{{ __("Password") }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="
                                            form-control
                                            @error('password')
                                            is-invalid
                                            @enderror
                                        " name="password" required autofocus autocomplete="new-password" />

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="
                                        col-md-4 col-form-label
                                        text-md-right
                                    ">{{ __("Confirm Password") }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password" />
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __("Reset Password") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection