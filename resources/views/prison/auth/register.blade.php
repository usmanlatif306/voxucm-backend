@extends('layouts.master')@section('title', 'Register') @section('content')
<!-- breadcrumbs start -->
<section class="breadcrumbs-area pt-200 pb-140 bg-1 bg-blue fix">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title">Register</h2>
                    <ul>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                        <li>register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumbs end -->
<div id="contact" class="contact-area pt-50 pb-50">
    <div class="container">
        <div class="section-title text-center">
            <h2>Register</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('prison.registeruser') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="
                                        col-md-3 col-form-label
                                    ">{{ __("Full Name") }}</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="
                                            form-control
                                            @error('name')
                                            is-invalid
                                            @enderror
                                        " name="name" value="{{ old('name') }}" required autocomplete="name"
                                        placeholder="Full Name" autofocus />

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="
                                        col-md-3 col-form-label
                                    ">{{ __("E-Mail Address") }}</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="
                                            form-control
                                            @error('email')
                                            is-invalid
                                            @enderror
                                        " name="email" placeholder="Email Address" value="{{ old('email') }}" required
                                        autocomplete="email" />

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="
                                        col-md-3 col-form-label
                                    ">{{ __("Phone Number") }}</label>

                                <div class="col-md-8">
                                    <input id="phone" type="number" class="
                                            form-control
                                            @error('phone')
                                            is-invalid
                                            @enderror
                                        " name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required
                                        autocomplete="phone" autofocus />

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="
                                        col-md-3 col-form-label
                                    ">{{ __("Address") }}</label>

                                <div class="col-md-8">
                                    <input id="phone" type="text" class="
                                            form-control
                                            @error('address')
                                            is-invalid
                                            @enderror
                                        " name="address" placeholder="Address" value="{{ old('address') }}" required />

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="
                                        col-md-3 col-form-label
                                    ">{{ __("City Name") }}</label>

                                <div class="col-md-8">
                                    <input id="phone" type="text" class="
                                            form-control
                                            @error('city')
                                            is-invalid
                                            @enderror
                                        " name="city" placeholder="City Name" value="{{ old('city') }}" required />

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="
                                        col-md-3 col-form-label
                                    ">{{ __("Country") }}</label>

                                <div class="col-md-8">
                                    <input id="phone" type="text" class="
                                            form-control
                                            @error('country')
                                            is-invalid
                                            @enderror
                                        " name="country" placeholder="Country" value="{{ old('country') }}" required />

                                    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="
                                        col-md-3 col-form-label
                                    ">{{ __("Post Code") }}</label>

                                <div class="col-md-8">
                                    <input id="phone" type="number" class="
                                            form-control
                                            @error('postcode')
                                            is-invalid
                                            @enderror
                                        " name="postcode" placeholder="Post Code" value="{{ old('postcode') }}"
                                        required autocomplete="postcode" autofocus />

                                    @error('postcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="
                                        col-md-3 col-form-label
                                    ">{{ __("Password") }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="
                                            form-control
                                            @error('password')
                                            is-invalid
                                            @enderror
                                        " name="password" placeholder="Password" required
                                        autocomplete="new-password" />

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="
                                        col-md-3 col-form-label
                                    ">{{ __("Confirm Password") }}</label>

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" placeholder="Confirm Password" required
                                        autocomplete="new-password" />
                                </div>

                            </div>
                            <!-- prison details -->
                            <div class="form-group row">
                                <label for="password-confirm" class="
                                        col-md-3 col-form-label
                                    ">{{ __("Prisoner First Name") }}</label>

                                <div class="col-md-8">
                                    <input type="text" name="prison_fname" class="form-control @error('prison_fname')
                                    is-invalid
                                    @enderror" value="{{ old('prison_fname') }}" placeholder="Prisoner First Name"
                                        required />
                                </div>
                                @error('prison_fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="
                                        col-md-3 col-form-label
                                    ">{{ __("Prisoner Last Name") }}</label>

                                <div class="col-md-8">
                                    <input type="text" name="prison_lname" class="form-control @error('prison_lname')
                                    is-invalid
                                    @enderror" value="{{ old('prison_lname') }}" placeholder="Prisoner Last Name"
                                        required />
                                </div>
                                @error('prison_lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="
                                        col-md-3 col-form-label
                                    ">{{ __("Prisoner Number") }}</label>

                                <div class="col-md-8">
                                    <input type="number" name="prison_number" class="form-control @error('prison_number')
                                    is-invalid
                                    @enderror" value="{{ old('prison_number') }}" placeholder="Prisoner Number"
                                        required />
                                </div>
                                @error('prison_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="
                                        col-md-3 col-form-label
                                    ">{{ __("Prison Status") }}</label>

                                <div class="col-md-8">
                                    <select name="prison_status" class="form-control" id="prison-status">
                                        <option value="">
                                            Select Prison Status
                                        </option>
                                        <option value="sentenced">Sentenced</option>
                                        <option value="remanded">Remanded</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row d-none" id="releaseDate">
                                <label for="password-confirm" class="
                                        col-md-3 col-form-label
                                    ">{{ __("Release Date") }}</label>

                                <div class="col-md-8">
                                    <input type="date" name="release_date" class="form-control"
                                        placeholder="Release Date" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="
                                        col-md-3 col-form-label
                                    ">{{ __("Relation With Prison") }}</label>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="prison_relation" class="form-control @error('prison_relation')
                                        is-invalid
                                        @enderror" value="{{ old('prison_relation') }}"
                                            placeholder="Relation With Prison" required />
                                    </div>
                                </div>
                                @error('prison_relation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __("Register") }}
                                    </button>
                                    <a class="btn btn-link" href="{{ route('prison.login') }}">
                                        {{ __("Already Have an Account?") }}
                                    </a>
                                    <div class="separator">Or Login With</div>
                                    <div class="text-center">
                                        <a class="btn btn-link pl-0 social-link" href="{{ route('prison.facebook') }}"
                                            title="Login With Facebook">
                                            <!-- {{ __("Login With Facebook") }} -->
                                            <span
                                                class="circle d-flex justify-content-center align-items-center border-primary">
                                                <i class="fab fa-facebook-f text-primary"></i>
                                            </span>

                                        </a>
                                        <a class="btn btn-link social-link" href="{{ route('prison.google') }}"
                                            title="Login With Google">
                                            <!-- {{ __("Login With Google") }} -->
                                            <span
                                                class="circle d-flex justify-content-center align-items-center border-danger">
                                                <i class="fab fa-google text-danger"></i>
                                            </span>
                                        </a>
                                    </div>
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
@push('scripts')
<script>
    $(document).ready(function () {
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