@extends('layouts.master')@section('title', 'Forget-Password')
@section('content')
<!-- breadcrumbs start -->
<section class="breadcrumbs-area pt-200 pb-140 bg-1 bg-blue fix">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title">forget password</h2>
                    <ul>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                        <li>forget password</li>
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
                <div class="card border-0">
                    <div class="card-body">
                        <div class="col-md-8 offset-md-2">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session("status") }}
                            </div>
                            @endif @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session("error") }}
                            </div>
                            @endif
                        </div>
                        <form method="POST" action="{{ route('prison.forget') }}">
                            @csrf

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
                                        " name="email" value="{{ old('email') }}" required autocomplete="email"
                                        autofocus />

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __("Send Password Reset Link") }}
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