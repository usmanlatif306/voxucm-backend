@extends('layouts.master')@section('title', 'Call History') @section('content')
@include('prison.dashboard.bread')
<div class="container pt-40 pb-40">

    <div class="row">
        <div class="col-12 col-md-3">@include('prison.dashboard.nav')</div>
        <div class="col-12 col-md-9">
            <form action="{{route('prison.callhistory.search')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>From Date</label>
                            <input type="datetime-local" name="from" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>To Date</label>
                            <input type="datetime-local" name="to" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>Destination Number</label>
                            <input type="number" name="destination" class="form-control"
                                placeholder="Destination Number">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>Extension</label>
                            <input type="number" name="extension" class="form-control" placeholder="Extension">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label>Call Type</label>
                            <select name="type" id="" class="form-control">
                                <option value="all">All Calls</option>
                                <option value="answered">Answered</option>
                                <option value="no-answered">No Answer</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mt-4">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </div>
                </div>
            </form>
            <hr>
            <!-- call hstory record shows here -->
            <table class="table table-bordered table-hover tenant-dash mt-3">
                <thead>
                    <tr style="background: rgba(0, 145, 234, 0.95); color: #fff; text-align: center;">
                        <th>Extension</th>
                        <th>Caller ID</th>
                        <th>Callee</th>
                        <th>Call Status</th>
                        <th>Timestamp</th>
                        <th>Destination</th>
                        <th>Duration</th>
                        <th>Call Rate</th>
                        <th>Call Cost</th>
                        <th>Call Record</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <h4>No Data</h4>
        </div>
    </div>
</div>
@endsection