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
<div class="card">
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope=" col" class="text-center">Name</th>
                    <th scope=" col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Email Verify</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th class="text-center">{{$loop->index+1}}</th>
                    <td class="text-center">{{$user->name}}</td>
                    <td class="text-center">{{$user->email}}</td>
                    <td class="text-center">{{$user->is_email_verified=== 1 ? 'Yes': 'No'}}</td>
                    <td class="text-center">
                        <form action="{{ route('admin.userstatus',$user->id)}}" method="post">
                            @csrf @method('put')
                            <button class="btn btn-sm {{$user->status===1 ? 'btn-danger text-white':'btn-warning'}}"
                                value="submit">
                                {{$user->status===1 ? 'Enable':'Disable'}}
                            </button>
                        </form>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.userdetails',$user->id)}}" class="btn btn-sm btn-primary"
                            value="submit">
                            Details
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endif
</div>

@endsection