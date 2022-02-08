@extends('layouts.account')@section('title', 'User Plan') @section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {!! session('error') !!}
    </div>
    @endif

    @if($plan->expired_at->subDays(8)->lessThan(now()))
    <div class="alert alert-danger">
        Your plan will expired after {{$plan->expired_at->diffInDays(now())}} days. kindly recharge it.
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            @if(!$plan) <h3>User has currently no active plan. Please buy any plan first.</h3>
            @else
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="m-0 p-0">User Active Plan</h3>
                    <!-- <a href="#" class="btn btn-sm btn-primary shadow-none">Expired
                        Plans</a> -->
                </div>
                <div class="card-body">

                    <!-- plan here -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tenant-dash mt-3">
                            <thead>
                                <tr class="tableheading" style="text-align: center;">
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Month</th>
                                    <th>Allowed Dids</th>
                                    <th>Remaining Dids</th>
                                    <th>Expiry Date</th>
                                    @if($plan->expired_at->subDays(8)->lessThan(now()))
                                    <th></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>{{$plan->product->name}}</td>
                                    <td>€{{$plan->product->price}}</td>
                                    <td>{{$plan->month}}</td>
                                    <td>{{$plan->product->lines}}</td>
                                    <td>{{$plan->allowed_dids}}</td>
                                    <td>{{$plan->expired_at->format('M j, Y H:i A')}}</td>
                                    @if($plan->expired_at->subDays(8)->lessThan(now()))
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary">
                                            Recharge
                                            </>
                                    </td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection