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
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name"
                                            value="{{auth()->user()->name}}" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Username</label>
                                        <input type="text" name="username" class="form-control" id="name"
                                            placeholder="Username" value="{{$user->username}}" />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="telephone">Telephone</label>
                                        <input type="number" name="phone" class="form-control" id="telephone"
                                            placeholder="Telephone" value="{{auth()->user()->phone}}" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="country">Country</label>
                                        <input type="text" name="country" class="form-control" id="country"
                                            placeholder="State" value="{{auth()->user()->country}}" />
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="city">City</label>
                                        <input type="text" name="city" class="form-control" id="city" placeholder="City"
                                            value="{{auth()->user()->city}}" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="postcode">Post Code</label>
                                        <input type="number" name="postcode" class="form-control" id="postcode"
                                            placeholder="Post Code" value="{{auth()->user()->postcode}}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="2"
                                        placeholder="Enter Address">{{auth()->user()->address}}</textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="city">Billing Type</label>
                                        <select name="billing_type" id="" class="form-control">
                                            <option value="PREPAID" {{ $user->billing_type === 'PREPAID'?
                                                'selected' : '' }}>PREPAID
                                            </option>
                                            <option value="POSTPAID" {{ $user->billing_type === 'POSTPAID'?
                                                'selected' : '' }}>POSTPAID</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="city">Billing Cycle</label>
                                        <select name="billing_cycle" id="" class="form-control">
                                            <option value="MONTHWISE" {{ $user->billing_cycle_mode=== 'MONTHWISE'?
                                                'selected' : '' }}>MONTHWISE</option>
                                            <option value="YEARWISE" {{ $user->billing_cycle_mode=== 'YEARWISE'?
                                                'selected' : '' }}>YEARWISE</option>
                                        </select>
                                    </div>
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
                <!-- update prison details -->
                <div class="col-12 col-md-6 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3>Update Prison Details</h3>
                        </div>
                        <div class="card-body">
                            @if (session('prison_success'))
                            <div class="alert alert-success" role="alert">
                                {{ session("prison_success") }}
                            </div>
                            @endif
                            @if (session('prison_error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session("prison_error") }}
                            </div>
                            @endif
                            <form action="{{ route('user.setting.prison') }}" method="post">
                                {{ method_field("PUT") }} @csrf
                                <div class="form-group">
                                    <label for="passwordId">Prison First Name</label>
                                    <input type="text" name="prison_fname" class="form-control @error('prison_fname')
                                    is-invalid
                                    @enderror" value="{{auth()->user()->user_details->prison_fname}}"
                                        placeholder="Prisoner First Name" required />
                                    @if(session('prison_fname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! session('prison_fname') !!}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="passwordId">Prisoner Last Name</label>
                                    <input type="text" name="prison_lname" class="form-control @error('prison_lname')
                                    is-invalid
                                    @enderror" value="{{auth()->user()->user_details->prison_lname}}"
                                        placeholder="Prisoner Last Name" required />
                                    @if(session('prison_lname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! session('prison_lname') !!}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="passwordId">Prisoner Number</label>
                                    <input type="number" name="prison_number" class="form-control @error('prison_number')
                                    is-invalid
                                    @enderror" value="{{auth()->user()->user_details->prison_number}}"
                                        placeholder="Prisoner Number" required />
                                    @if(session('prison_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! session('prison_number') !!}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="passwordId">Prison Status</label>
                                    <select name="prison_status" class="form-control" id="prison-status"
                                        value="{{auth()->user()->user_details->prison_status}}">
                                        <option value="">
                                            Select Prison Status
                                        </option>
                                        <option value="sentenced" {{auth()->user()->user_details->prison_status ===
                                            'sentenced' ? 'selected': ''}}>Sentenced</option>
                                        <option value="remanded" {{auth()->user()->user_details->prison_status ===
                                            'remanded' ? 'selected': ''}}>Remanded</option>
                                    </select>
                                    @if(session('prison_status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! session('prison_status') !!}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group d-none" id="releaseDate">
                                    <label for="passwordId">Release Date</label>
                                    <input type="date" name="release_date" class="form-control @error('release_date')
                                    is-invalid
                                    @enderror" value="{{auth()->user()->user_details->release_date}}"
                                        placeholder="Release Date" />
                                    @if(session('release_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! session('release_date') !!}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="passwordId">Relation With Prison</label>
                                    <input type="text" name="prison_relation" class="form-control @error('prison_relation')
                                    is-invalid
                                    @enderror" value="{{auth()->user()->user_details->prison_relation}}"
                                        placeholder="Relation With Prison" required />
                                    @if(session('prison_relation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! session('prison_relation') !!}</strong>
                                    </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Update Prison Details
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
@push('scripts')
<script>
    $(document).ready(function () {
        if ($("select[name='prison_status']").val() === 'sentenced') {
            $("#releaseDate").removeClass("d-none");
        }
        $("select[name='prison_status']").change(function (e) {
            var status = e.target.value;
            if (status === "sentenced") {
                $("#releaseDate").removeClass("d-none");
            } else {
                $("#releaseDate").addClass("d-none");
            }
        });
    })

</script>
@endpush