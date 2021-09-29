@extends('admin.auth.layout') @section('content')
<form
    action="{{ route('admin.password.reset') }}"
    method="post"
    class="md-float-material form-material"
>
    @csrf
    <input type="hidden" name="token" value="{{ $token }}" />
    <div class="text-center">
        <img src="assets/images/logo.png" alt="logo.png" />
    </div>
    <div class="auth-box card">
        <div class="card-block">
            <div class="row m-b-20">
                <div class="col-md-12">
                    <h3 class="text-center">Reset Password</h3>
                </div>
            </div>
            @if(session('error'))
            <div class="alert alert-danger">{!! session('error') !!}</div>
            @endif
            <div class="form-group form-primary">
                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') border-danger @enderror"
                    value="{{ $email ?? old('email') }}"
                    required
                    readonly
                />
                <span class="form-bar"></span>
                <!-- <label class="float-label">Email Address</label> -->
                @error('email')
                <span class="invalid" role="alert">
                    <strong>{{ $message }}</strong></span
                >
                @enderror
            </div>
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
                        Reset Password
                    </button>
                </div>
            </div>
            <hr />
        </div>
    </div>
</form>
@endsection
