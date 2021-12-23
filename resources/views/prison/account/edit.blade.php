@extends('layouts.account')@section('title', 'My Account') @section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
    @endif
    <!--Grid row-->


    <!--Grid row-->
    <div class="row wow fadeIn">
        <div class="col-md-7 mb-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="p-0 m-0">Update My Account</h4><br>
                </div>
                <div class=" card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="title">Title</label>
                                <select class="custom-select" id="inputGroupSelect01">

                                    <option value="Mr">Mr</option>
                                    <option value="Dr">Dr</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Ms">Ms</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Master">Master</option>
                                    <option value="Prof">Prof</option>
                                    <option value="Hon">Hon</option>
                                    <option value="Gov">Gov</option>
                                    <option value="Ofc">Ofc</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" id="phone" placeholder="+442071834834">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control" id="name" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email@gmail.com">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Address*</label>
                                <textarea type="textarea" class="form-control" id="Address"
                                    placeholder="Address"></textarea>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="submit" class="btn btn-primary">Back</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Update password -->
        <div class="col-md-5 mb-12 mt-3 mt-md-0">
            <div class="card">
                <div class="card-header">
                    <h4 class="p-0 m-0">Update Password</h4><br>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-8 offset-md-2">
                                <label for="Old password">Old Password*</label>
                                <input type="password" class="form-control" id="Old Password" placeholder="">
                            </div>

                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-8 offset-md-2">
                                <label for="New Password">New Password*</label>
                                <input type="password" class="form-control" id="New Password"
                                    placeholder="New Password*">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8 offset-md-2">
                                <label for="Confirm New Password">Confirm New Password*</label>
                                <input type="password" class="form-control" id="Confirm New Password"
                                    placeholder="Confirm New Password">
                            </div>
                        </div>

                        <div class="col-md-8 offset-md-2 pl-0">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection