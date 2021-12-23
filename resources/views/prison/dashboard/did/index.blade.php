@extends('layouts.master')@section('title', 'DID') @section('content')
@include('prison.dashboard.bread')
<div class="container pt-40 pb-40">
    <div class="row">
        <div class="col-12 col-md-3">@include('prison.dashboard.nav')</div>
        <div class="col-12 col-md-9">
            @if(session('success'))
            <div class="alert alert-success ml-md-4">
                {!! session('success') !!}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger ml-md-4">
                {!! session('error') !!}
            </div>
            @endif
            <div class="border rounded ml-md-4 mt-3 mt-md-0">
                <div class="card__header p-2 d-flex justify-content-between">
                    Order History
                    <a href="{{route('prison.did.cities')}}" class="btn btn-sm btn-primary">Purchase New DID</a>
                </div>
                <div class="py-2 px-3">
                    <!-- extension list here -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover tenant-dash mt-3">
                            <thead>
                                <tr class="tableheading" style="text-align: center;">
                                    <th>No</th>
                                    <th>User</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>DID</th>
                                    <th>Payment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($numbers) ===0)
                                <tr class="text-center">
                                    <td colspan="9">No Data</td>
                                </tr>
                                @else
                                @foreach($numbers as $number)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$number->user->name}}</td>
                                    <td>{{$number->state}}</td>
                                    <td>{{$number->city}}</td>
                                    <td>{{$number->dialing_code}}</td>
                                    <td>
                                        @if($number->order_status==='Unpaid')
                                        <span class="text-danger">
                                            {{$number->order_status}}
                                        </span>
                                        @else
                                        <span class="text-success">
                                            {{$number->order_status}}
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('prison.did.delete',$number->id)}}" method="post"
                                            id='did-{{$number->id}}'>
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <span class="cursor-pointer" style="cursor: pointer;" onclick="window.confirm(
                                                document.getElementById('did-{{$number->id}}').submit()
                                            );"><i class="fas fa-trash text-danger"></i></span>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection