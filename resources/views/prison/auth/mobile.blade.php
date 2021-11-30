@extends('layouts.master')@section('title', 'Verify Mobile Number') @section('content')
<!-- breadcrumbs start -->
<section class="breadcrumbs-area pt-200 pb-140 bg-1 bg-blue fix">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title">Verify Mobile Number</h2>
                    <ul>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                        <li>Verify Mobile Number</li>
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-10 offset-md-1">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {!! session('success') !!}
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {!! session('error') !!}
                    </div>
                    @endif
                </div>

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('mobile.verify') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="otp" class="
                                        col-md-3 col-form-label
                                        text-md-right
                                    ">{{ __("Enter OTP") }}</label>

                                <div class="col-md-6">
                                    <input id="otp" type="number" class="
                                            form-control
                                            @error('otp')
                                            is-invalid
                                            @enderror
                                        " name="otp" value="{{ old('otp') }}" required autofocus />

                                    @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __("Verify OTP") }}
                                    </button>
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