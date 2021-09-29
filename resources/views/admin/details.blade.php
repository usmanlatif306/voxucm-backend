@extends('layouts.admin') @section('content')

<div class="container-fluid">
    <div class="bg-white mt-2 pt-3">
        <h1 class="text-center">User Details</h1>
        <div class="px-3">
            <h6>Name: {{$user->name}}</h6>
            <h6>Email: {{$user->email}}</h6>
        </div>
        @if(count($numbers) < 1)
        <div class="section-title text-center">
            <h2>User Has No DID</h2>
        </div>
        @else @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session("success") }}
        </div>
        @endif
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Country</th>
                    <th scope="col">City</th>
                    <th scope="col">DID</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($numbers as $number)
                <tr>
                    <th>{{$loop->index+1}}</th>
                    <td>{{$number->country}}</td>
                    <td>{{$number->city}}</td>
                    <td>{{$number->did}}</td>
                    <td>
                        <form
                            action="{{ route('admin.userstatus',$user->id)}}"
                            method="post"
                        >
                            @csrf @method('put')
                            <button
                                class="btn btn-sm {{$user->status===1 ? 'btn-danger text-white':'btn-warning'}}"
                                value="submit"
                            >
                                <!-- {{$number->status===1 ? 'Enable':'Disable'}} -->
                                Enable
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

@endsection
