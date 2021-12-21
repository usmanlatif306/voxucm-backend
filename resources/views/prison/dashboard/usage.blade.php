@extends('layouts.master')@section('title', 'Dashboard') @section('content')
@include('prison.dashboard.bread')
<div class="container pt-40 pb-40">
    <div class="row">
        <div class="col-12 col-md-3">@include('prison.dashboard.nav')</div>
        <div class="col-12 col-md-9">
            <div class="border rounded ml-md-4 mt-3 mt-md-0">
                <div class="card__header p-3">Account Balance</div>
                <div class="py-2 px-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td scope="col">#</td>
                                <td scope="col">Line Number</td>
                                <td scope="col">Total Minutes</td>
                                <td scope="col">Used Minutes</td>
                                <td scope="col">Remaing Balance</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="border rounded ml-md-4 mt-5">
                <div class="card__header p-3">Account Usage History</div>
                <div class="py-2 px-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td scope="col">ID</td>
                                <td scope="col">Date</td>
                                <td scope="col">Line Number</td>
                                <td scope="col">Duration</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection