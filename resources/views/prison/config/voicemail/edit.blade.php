@extends('layouts.account')@section('title', 'Voice Mail') @section('content')

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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="m-0 p-0">Update Voice Mail</h3>
                    <a href="{{route('prison.config.voicemail')}}" class="btn btn-sm btn-primary">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{route('prison.voicemail.update',$voicemail->voicemail_id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username"
                                        placeholder="Enter Username" value="{{$voicemail->extension}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="secret">Voice Secret</label>
                                    <input type="number" name="secret" class="form-control" id="secret"
                                        placeholder="Voice Secret" value="{{$voicemail->voicemail_secret}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Voice Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Voice Email" value="{{$voicemail->voice_mail}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Update Voice Mail</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

</div>

@endsection