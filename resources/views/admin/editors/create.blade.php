@extends('layouts.admin') @section('content')
<div class="row">
    <div class="col-12 col-md-8 offset-md-2">
        <!-- <form action="{{route('admin.csv')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" name="file" class="form-control" />
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100">
                        Store
                    </button>
                </div>
            </div>
        </form> -->
        <form action="{{route('admins.store')}}" method="post" class="border-bottom mb-3">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Create New Role</h3>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{old('email')}}" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>User Role</label>
                                <select name="role_id" id="" class="form-control border">
                                    <option {{old('role_id')==1 ? 'selected' :''}} value="1">Admin</option>
                                    <option {{old('role_id')==3 ? 'selected' :''}} value="3">Editor</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-12">
                            <div class="form-group">
                                <label>user Status</label>
                                <select name="status" class="form-control border">
                                    <option value="1">Active</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">
                                Store
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection