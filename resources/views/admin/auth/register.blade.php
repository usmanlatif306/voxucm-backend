@extends('admin.auth.layout') @section('content')
<form
    action="{{ route('admin.signup') }}"
    method="post"
    class="md-float-material form-material"
>
    @csrf
    <div class="text-center">
        <img src="assets/images/logo.png" alt="logo.png" />
    </div>
    <div class="auth-box card">
        <div class="card-block">
            <div class="row m-b-20">
                <div class="col-md-12">
                    <h3 class="text-center">Sign up</h3>
                </div>
            </div>
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session("success") }}
            </div>
            @endif
            <div class="form-group form-primary">
                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') border-danger @enderror"
                    required
                />
                <span class="form-bar"></span>
                <label class="float-label">Name</label>
                @error('name')
                <span class="invalid" role="alert">
                    <strong>{{ $message }}</strong></span
                >
                @enderror
            </div>

            <div class="form-group form-primary">
                <input
                    type="text"
                    name="email"
                    class="form-control @error('email') border-danger @enderror"
                    required
                />
                <span class="form-bar"></span>
                <label class="float-label">Your Email Address</label>
                @error('email')
                <span class="invalid" role="alert">
                    <strong>{{ $message }}</strong></span
                >
                @enderror
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group form-primary">
                        <input
                            type="password"
                            name="password"
                            class="
                                form-control
                                @error('password')
                                border-danger
                                @enderror
                            "
                            required
                        />
                        <span class="form-bar"></span>
                        <label class="float-label">Password</label>
                        @error('password')
                        <span class="invalid" role="alert">
                            <strong>{{ $message }}</strong></span
                        >
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group form-primary">
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            required
                        />
                        <span class="form-bar"></span>
                        <label class="float-label">Confirm Password</label>
                    </div>
                </div>
            </div>

            <div class="row m-t-30">
                <div class="col-md-12">
                    <button
                        type="submit"
                        class="
                            btn btn-primary btn-md btn-block
                            waves-effect waves-light
                            text-center
                            m-b-20
                        "
                    >
                        Sign up
                    </button>
                </div>
            </div>
            <div class="m-t-10 text-center">
                <a href="{{ route('admin.login') }}" class="f-w-600">
                    Already Have Account?</a
                >
            </div>
        </div>
        <hr />
    </div>
</form>
@endsection
