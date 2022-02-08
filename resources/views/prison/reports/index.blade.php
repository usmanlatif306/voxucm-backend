@extends('layouts.account')@section('title', 'Live Calls') @section('content')

<div class="containerpb-40">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <form action="#" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <!-- <label>Destinantion Number</label> -->
                            <input type="number" name="" class="form-control" placeholder="Destinantion Number">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <!-- <label>Extension</label> -->
                            <select name="extensions" id="" class="form-control">
                                <option value="all">All Extensions</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <!-- <label>Call Type</label> -->
                            <select name="type" id="" class="form-control">
                                <option value="all">All Calls</option>
                                <option value="answered">Answered</option>
                                <option value="no-answered">No Answer</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 ">
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
                            <th>Extension</th>
                            <th>Caller ID</th>
                            <th>Callee</th>
                            <th>Country</th>
                            <th>Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5">No Data</td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>
@endsection