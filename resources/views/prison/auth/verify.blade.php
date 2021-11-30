@extends('layouts.master')@section('title', 'Verification')@section('content')
<!-- breadcrumbs start -->
<section class="breadcrumbs-area pt-200 pb-140 bg-1 bg-blue fix">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title">Verification</h2>
                    <ul>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                        <li>Verification</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumbs end -->
<div id="contact" class="contact-area bg-light pt-50 pb-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="section-title text-center">
                        <h2>{{ __("Verify Your Email Address") }}</h2>
                    </div>

                    <div class="card-body">
                        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{
                            __(
                            "A fresh verification link has been sent to your email address."
                            )
                            }}
                        </div>
                        @endif

                        {{
                        __(
                        "Before proceeding, please check your email for a verification link."
                        )
                        }}
                        {{ __("If you did not receive the email") }},
                        <form class="d-inline" method="POST" action="{{ route('user.reverify') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                {{
                                __("click here to request another")
                                }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection