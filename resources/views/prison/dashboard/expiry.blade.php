@extends('layouts.master')@section('title', 'Dashboard') @section('content')
@include('prison.dashboard.bread')
<div class="container pt-40 pb-40">
    <div class="row">
        <div class="col-12 col-md-3">@include('prison.dashboard.nav')</div>
        <div class="col-12 col-md-9">
            <div class="border rounded ml-md-4 mt-3 mt-md-0 dash__width w-100">
                <div class="card__header p-3">Lines</div>
                <div class="py-2 px-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Line</th>
                                <th scope="col">Minutes</th>
                                <th scope="col">Used</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Prisoner Name</th>
                                <th scope="col">Number</th>
                                <th scope="col">Connecting Mobile</td>
                                <th scope="col">Issued Date</td>
                                <th scope="col">Expiry Date</td>
                                <th scope="col">Status</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

