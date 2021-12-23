@extends('layouts.account')@section('title', 'Account') @section('content')
<div class="container pb-40">

    <div class="row">
        <!--Grid column-->
        <div class="col-12 col-md-10 offset-md-1 mb-12">
            @if(session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Account Details</h3>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped table-bordered">
                        <!-- Table body -->
                        <tbody>
                            <tr>
                                <th scope="row">Name</th>
                                <td>{{auth()->user()->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone</th>
                                <td>
                                    {{auth()->user()->phone}}
                                    @if(auth()->user()->phone)
                                    @if (auth()->user()->is_phone_verified === 0)
                                    <span class="text-danger ml-3"
                                        onclick="document.getElementById('verifyOtp').submit();"
                                        title="Click here to verify mobile number" style="cursor: pointer;">unverify
                                    </span>
                                    @else
                                    <span class="text-success ml-3">verified</span>
                                    @endif
                                    <form class="d-none" id="verifyOtp" method="POST"
                                        action="{{ route('prison.mobile') }}">
                                        @csrf
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Country</th>
                                <td>{{auth()->user()->country}}</td>
                            </tr>
                            <tr>
                                <th scope="row">City</th>
                                <td>{{auth()->user()->city}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Post Code</th>
                                <td>{{auth()->user()->postcode}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>
                                    {{auth()->user()->email}}
                                    @if (auth()->user()->is_email_verified === 1)
                                    <span class="text-success ml-3">verified</span>
                                    @endif
                                </td>
                            </tr>

                        </tbody>
                        <!-- Table body -->
                    </table>
                </div>

            </div>

        </div>
        <!--Grid column-->

    </div>
</div>
@endsection