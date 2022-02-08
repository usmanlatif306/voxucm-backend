@extends('layouts.admin') @section('content')

<div class="container-fluid">
    <div class="bg-white mt-2 pt-3">
        <h1 class="text-center">User Details</h1>
        <div class="px-3 d-flex">
            <h6>Name: {{$user->name}}</h6>
            <h6 class="mx-3">Email: {{$user->email}}</h6>
        </div>
        @if(count($numbers) < 1) <div class="section-title text-center">
            <h2>User has No DID</h2>
    </div>
    @else @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session("success") }}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">City</th>
                        <th scope="col" class="text-center">DID</th>
                        <th scope="col" class="text-center">Payment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($numbers as $number)
                    <tr>
                        <th class="text-center">{{$loop->iteration}}</th>
                        <td class="text-center">{{$number->city}}</td>
                        <td class="text-center">{{$number->dialing_code}}</td>
                        <td class="text-center">
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
                        <!-- <td class="text-center">
                            <form action="{{ route('admin.userstatus',$user->id)}}" method="post">
                                @csrf @method('put')
                                <button class="btn btn-sm {{$user->status===1 ? 'btn-danger text-white':'btn-warning'}}"
                                    value="submit">
                                    Enable
                                </button>
                            </form>
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endif
</div>
</div>

@endsection