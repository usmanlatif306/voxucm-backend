@extends('layouts.account')@section('title', 'Dashboard') @section('content')
<div class="container pb-40">
    <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <h3>Lines</h3>
                </div>
                <div class="card-body">
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