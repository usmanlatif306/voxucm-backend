@extends('layouts.account')@section('title', 'My Account') @section('content')
    <div class="container-fluid mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        @endif
        <!--Grid row-->
        <div class="row wow fadeIn">
            <div class="container-fluid mb-3">
                <div class="row">
                    <div class="col-md-8">
                    </div>
                    <div class="col-12 col-md-4">
                        <a href="{{ route('prison.account.edit') }}" class="btn btn-sm btn-primary mx-3">Edit</a>
                        <a href="{{ route('prison.account.password') }}" class="btn btn-sm btn-primary">Change Password</a>
                    </div>
                </div>
            </div>
            <!--Grid column-->
            <div class="col-12 col-md-10 offset-md-1 mb-12">
                <table class="table table-hover table-bordered">
                    <!-- Table head -->
                    <thead class="tableheading">
                        <th colspan="2">My Account Details</th>
                    </thead>
                    <!-- Table head -->

                    <!-- Table body -->
                    <tbody>
                        <tr>
                            <th scope="row">Id</th>
                            <td>{{ $user->tenant_id }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Username</th>
                            <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Name</th>
                            <td>{{ $user->firstname }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Address</th>
                            <td>{{ $user->address }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone</th>
                            <td>{{ $user->phonenumber ? $user->phonenumber : '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{ $user->emailaddress ? $user->emailaddress : '-' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Balance</th>
                            <td>{{ number_format((float) $user->credit, 4, '.', '') }}</td>
                        </tr>
                    </tbody>
                    <!-- Table body -->
                </table>
            </div>
            <!--Grid column-->
        </div>
    </div>

@endsection
