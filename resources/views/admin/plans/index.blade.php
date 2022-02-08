@extends('layouts.admin') @section('content')
<div class="bg-white mt-2 pt-3">
    <h1 class="text-center">Plans List</h1>
    @if(count($plans) < 1) <div class="section-title text-center">
        <h2>No Active Plans</h2>
</div>
@else @if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session("success") }}
</div>
@endif
<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Month</th>
                    <th>Lines</th>
                    <th>Expiry Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plans as $plan)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$plan->user->name}}</td>
                    <td>{{$plan->product->name}}</td>
                    <td>€{{$plan->product->price}}</td>
                    <td>{{$plan->month}}</td>
                    <td>{{$plan->product->lines}}</td>
                    <td>{{$plan->expired_at->format('M j, Y H:i A')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endif

@endsection