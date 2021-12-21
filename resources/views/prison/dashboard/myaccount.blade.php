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
        <div class="col-12 col-md-9 mt-3 mt-md-0">
            <div class="border rounded ">
                <div class="card__header p-3">Account Details</div>
                <div class="px-3">
                    <div class="d-flex">

                    </div>
                    <div class="d-flex">
                        <h6 class="py-2 semi-bold w-25">
                            Username:
                        </h6>
                        <h6 class="py-2 semi-bold">
                            {{auth()->user()->name}}
                        </h6>
                    </div>


                    <div class="d-flex">
                        <h6 class="py-2 semi-bold w-25">
                            Phone:
                        </h6>
                        <h6 class="py-2 semi-bold">
                            {{auth()->user()->phone}}
                            @if(auth()->user()->phone)
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
                            @endif
                        </h6>
                    </div>
                    <div class="d-flex">
                        <h6 class="py-2 semi-bold w-25">
                            Country:
                        </h6>
                        <h6 class="py-2 semi-bold">
                            {{auth()->user()->country}}
                        </h6>
                    </div>
                    <div class="d-flex">
                        <h6 class="py-2 semi-bold w-25">
                            City:
                        </h6>
                        <h6 class="py-2 semi-bold">
                            {{auth()->user()->city}}
                        </h6>
                    </div>
                    <div class="d-flex">
                        <h6 class="py-2 semi-bold w-25">
                            Postcode:
                        </h6>
                        <h6 class="py-2 semi-bold">
                            {{auth()->user()->postcode}}
                        </h6>
                    </div>
                    <div class="d-flex">
                        <h6 class="py-2 semi-bold w-25">
                            Email:
                        </h6>
                        <h6 class="py-2 semi-bold">
                            {{auth()->user()->email}}
                            @if (auth()->user()->is_email_verified === 1)
                            <span class="text-success ml-3">verified</span>
                            @endif
                        </h6>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection