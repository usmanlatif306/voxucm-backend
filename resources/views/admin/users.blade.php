@extends('layouts.admin') @section('content')
<div class="bg-white mt-2 pt-3">
    <h1 class="text-center">Users List</h1>
    @if(count($users) < 1) <div class="section-title text-center">
        <h2>No User Found</h2>
</div>
@else @if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session("success") }}
</div>
@endif
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope=" col">Name</th>
            <th scope=" col">Email</th>
            <th scope="col">Email Verify</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th>{{$loop->index+1}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->is_email_verified=== 1 ? 'Yes': 'No'}}</td>
            <td>
                <form action="{{ route('admin.userstatus',$user->id)}}" method="post">
                    @csrf @method('put')
                    <button class="btn btn-sm {{$user->status===1 ? 'btn-danger text-white':'btn-warning'}}"
                        value="submit">
                        {{$user->status===1 ? 'Enable':'Disable'}}
                    </button>
                </form>
            </td>
            <td>
                <form action="{{ route('admin.userdetails',$user->id)}}" method="get">
                    @csrf
                    <button class="btn btn-sm btn-primary" value="submit">
                        Details
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
</div>

@endsection