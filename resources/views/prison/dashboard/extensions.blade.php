@extends('layouts.master')@section('title', 'Extensions') @section('content')
@include('prison.dashboard.bread')
<div class="container pt-40 pb-40">

    <div class="row">
        <div class="col-12 col-md-3">@include('prison.dashboard.nav')</div>
        <div class="col-12 col-md-9">
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
            <div class="d-flex justify-content-between">
                <h3 class="m-0 p-0">Extensions</h3>
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">Add New</button>
            </div>
            <!-- Extension list shows here -->
            <table class="table table-bordered table-hover tenant-dash mt-3">
                <thead>
                    <tr style="background: rgba(0, 145, 234, 0.95); color: #fff; text-align: center;">
                        <th>No</th>
                        <th>Extension</th>
                        <th>User Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($extensions as $extension)
                    <tr class="text-center">
                        <td>{{$loop->index+1}}</td>
                        <td>{{$extension['EXTENSION']}}</td>
                        <td>{{$extension['USERNAME']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Add extension model shows here -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> -->
                        <div class="modal-body">
                            <h3>Add New Extension</h3>
                            <form action="{{route('prison.extensions.add')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="extension">Extension</label>
                                    <input type="number" name="extension" class="form-control" id="extension"
                                        placeholder="Enter Extension" required>
                                </div>
                                <div class="form-group">
                                    <label for="extensionPassword">Password</label>
                                    <input type="password" name="password" class="form-control" id="extensionPassword"
                                        placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection