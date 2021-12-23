@extends('layouts.account')@section('title', 'Edit Profile') @section('content')

<div class="container pb-40">
    <div class="row">

        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session("status") }}
                            </div>
                            @endif
                            <form action="{{ route('user.setting.details') }}" method="post">
                                {{ method_field("PUT") }} @csrf
                                <input type="hidden" name="id" value="{{auth()->user()->id}}" />
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                                        value="{{auth()->user()->name}}" />
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Telephone</label>
                                    <input type="number" name="phone" class="form-control" id="telephone"
                                        placeholder="Telephone" value="{{auth()->user()->phone}}" />
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="2"
                                        placeholder="Enter Address">{{auth()->user()->address}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" class="form-control" id="country"
                                        placeholder="State" value="{{auth()->user()->country}}" />
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" class="form-control" id="city" placeholder="City"
                                        value="{{auth()->user()->city}}" />
                                </div>
                                <div class="form-group">
                                    <label for="postcode">Post Code</label>
                                    <input type="number" name="postcode" class="form-control" id="postcode"
                                        placeholder="Post Code" value="{{auth()->user()->postcode}}" />
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    Update Details
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-3 mt-md-0">
                    <div class="card">
                        <div class="card-header">
                            <h3>Update Password</h3>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session("success") }}
                            </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session("error") }}
                            </div>
                            @endif
                            <form action="{{ route('user.setting.password') }}" method="post">
                                {{ method_field("PUT") }} @csrf
                                <div class="form-group">
                                    <label for="passwordId">Old Password</label>
                                    <input id="passwordId" type="password" name="old_password" class="
                                            form-control
                                            @if(session('old_password'))
                                            is-invalid
                                            @enderror
                                        " />
                                    @if(session('old_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! session('old_password') !!}</strong>
                                    </span>
                                    @endif
                                </div>
                                <hr />
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" name="password" class="
                                            form-control
                                            @error('password')
                                            is-invalid
                                            @enderror
                                        " id="password" placeholder="New Password" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cpassword">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="cpassword" placeholder="Conform Password" />
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
    </div>
</div>
@endsection