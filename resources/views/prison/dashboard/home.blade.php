@extends('layouts.master')@section('title', 'Dashboard') @section('content')
@include('prison.dashboard.bread')
<div class="container pt-40 pb-40">
    @if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
    @endif
    <div class="row">
        <div class="col-12 col-md-3">@include('prison.dashboard.nav')</div>
        <div class="col-12 col-md-9">
            <div class="border rounded ml-4 w-75">
                <div class="card__header p-3">Account Details</div>
                <div class="px-3">
                    <h6 class="py-2 semi-bold">
                        Name: {{auth()->user()->name}}
                    </h6>
                    <h6 class="py-2 semi-bold">
                        Address: {{auth()->user()->address}}
                    </h6>
                    <h6 class="py-2 semi-bold">
                        Phone: {{auth()->user()->phone}}
                        @if (auth()->user()->is_phone_verified === 0)
                        <a class="btn btn-link p-0 ml-3 align-baseline text-danger"
                            onclick="document.getElementById('verifyOtp').submit();"
                            title="Click here to send OTP">unverify</a>
                        @else
                        <span class="text-success ml-3">verified</span>
                        @endif
                        <form class="d-inline" id="verifyOtp" method="POST" action="{{ route('prison.mobile') }}">
                            @csrf
                        </form>
                    </h6>
                    <h6 class="py-2 semi-bold">
                        Country: {{auth()->user()->country}}
                    </h6>
                    <h6 class="py-2 semi-bold">
                        City: {{auth()->user()->city}}
                    </h6>
                    <h6 class="py-2 semi-bold">
                        Postcode: {{auth()->user()->postcode}}
                    </h6>
                    <h6 class="py-2 semi-bold">
                        Email: {{auth()->user()->email}}
                        @if (auth()->user()->is_email_verified === 1)
                        <span class="text-success ml-3">verified</span>
                        @endif
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection