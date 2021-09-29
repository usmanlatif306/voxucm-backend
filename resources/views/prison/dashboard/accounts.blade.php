@extends('layouts.master')@section('title', 'Dashboard') @section('content')
@include('prison.dashboard.bread')
<div class="container pt-40 pb-40">
    <div class="row">
        <div class="col-12 col-md-3">@include('prison.dashboard.nav')</div>
        <div class="col-12 col-md-9">
            <div class="border rounded ml-md-4 mt-3 mt-md-0 dash__width">
                <div class="card__header p-3">Order History</div>
                <div class="py-2 px-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td scope="col">Order#</td>
                                <td scope="col">Email</td>
                                <td scope="col">PostCode</td>
                                <td scope="col">Order Amount</td>
                                <td scope="col">Date</td>
                                <td scope="col">Status</td>
                                <td scope="col">Action</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
