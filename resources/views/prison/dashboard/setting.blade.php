@extends('layouts.master')@section('title', 'Dashboard') @section('content')
@include('prison.dashboard.bread')
<div class="container pt-40 pb-40">
    <div class="row">
        <div class="col-12 col-md-3">@include('prison.dashboard.nav')</div>
        <div class="col-12 col-md-9 mt-3 mt-md-0">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="mb-4 p-0">
                        <h2>Edit Profile</h2>
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session("status") }}
                    </div>
                    @endif
                    <form
                        action="{{ route('user.setting.details') }}"
                        method="post"
                    >
                        {{ method_field("PUT") }} @csrf
                        <input
                            type="hidden"
                            name="id"
                            value="{{auth()->user()->id}}"
                        />
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                id="name"
                                placeholder="Name"
                                value="{{auth()->user()->name}}"
                            />
                        </div>
                        <div class="form-group">
                            <label for="telephone">Telephone</label>
                            <input
                                type="number"
                                name="phone"
                                class="form-control"
                                id="telephone"
                                placeholder="Telephone"
                                value="{{auth()->user()->phone}}"
                            />
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea
                                class="form-control"
                                id="address"
                                name="address"
                                rows="2"
                                placeholder="Enter Address"
                                >{{auth()->user()->address}}</textarea
                            >
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input
                                type="text"
                                name="country"
                                class="form-control"
                                id="country"
                                placeholder="State"
                                value="{{auth()->user()->country}}"
                            />
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input
                                type="text"
                                name="city"
                                class="form-control"
                                id="city"
                                placeholder="City"
                                value="{{auth()->user()->city}}"
                            />
                        </div>
                        <div class="form-group">
                            <label for="postcode">Post Code</label>
                            <input
                                type="number"
                                name="postcode"
                                class="form-control"
                                id="postcode"
                                placeholder="Post Code"
                                value="{{auth()->user()->postcode}}"
                            />
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Update Details
                        </button>
                    </form>
                </div>
                <div class="col-12 col-md-6 mt-3 mt-md-0">
                    <div class="mb-4 p-0">
                        <h2>Update Password</h2>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session("success") }}
                    </div>
                    @endif
                    <form
                        action="{{ route('user.setting.password') }}"
                        method="post"
                    >
                        {{ method_field("PUT") }} @csrf
                        <div class="form-group">
                            <label for="emailid">User email / Login Id</label>
                            <input
                                id="email"
                                type="email"
                                name="email"
                                class="
                                    form-control
                                    @if(session('email'))
                                    is-invalid
                                    @enderror
                                "
                                value="{{ old('email') }}"
                            />
                            @if(session('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{!! session('email') !!}</strong>
                            </span>
                            @endif
                        </div>
                        <hr />
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input
                                type="password"
                                name="password"
                                class="
                                    form-control
                                    @error('password')
                                    is-invalid
                                    @enderror
                                "
                                id="password"
                                placeholder="New Password"
                            />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Confirm Password</label>
                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                id="cpassword"
                                placeholder="Conform Password"
                            />
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Update Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
