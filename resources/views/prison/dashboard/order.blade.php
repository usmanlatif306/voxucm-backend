@extends('layouts.account')@section('title', 'Order History') @section('content')

<div class="container pb-40">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Order History</h3>
                </div>
                <div class="card-body">
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