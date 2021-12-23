@extends('layouts.account')@section('title', 'Dashboard') @section('content')
<div class="container pb-40">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>Account Balance</h3>
                </div>
                <div class="card-body">
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
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Account Balance</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td scope="col">ID</td>
                                <td scope="col">Date</td>
                                <td scope="col">Line Number</td>
                                <td scope="col">Duration</td>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection