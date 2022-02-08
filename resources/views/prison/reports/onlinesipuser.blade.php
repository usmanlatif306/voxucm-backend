@extends('layouts.account')@section('title', 'Live Online SIP Users') @section('content')

<div class="containerpb-40">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <form action="#" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <!-- <label>Destinantion Number</label> -->
                            <input type="text" name="username" class="form-control" placeholder="SIP Username">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <!-- <label>Destinantion Number</label> -->
                            <input type="text" name="ipaddress" class="form-control" placeholder="IP Address">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </div>
                </div>
            </form>
            <hr>
            <!-- call hstory record shows here -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover tenant-dash mt-3">
                    <thead>
                        <tr style="text-align: center;">
                            <th>SIP Username</th>
                            <th>IP Address</th>
                            <th>Port</th>
                            <th>Full Contact</th>
                            <th>User Agent</th>
                            <th>User Agent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6">No Data</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>
@endsection