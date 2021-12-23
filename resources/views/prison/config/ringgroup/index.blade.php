@extends('layouts.account')@section('title', 'Ring Group') @section('content')

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
                    <h3 class="m-0 p-0">Ring Group</h3>
                    <button class="btn btn-sm btn-primary shadow-none" data-toggle="modal" data-target="#exampleModal">
                        Add Ring Group</button>
                </div>
                <div class="card-body">
                    <!-- extension list here -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover tenant-dash mt-3">
                            <thead>
                                <tr class="tableheading" style="text-align: center;">
                                    <th>Ring Group</th>
                                    <th>Ring Group Description</th>
                                    <th>CLI Prefix</th>
                                    <th>Ring Time</th>
                                    <th>Failure App</th>
                                    <th>Failure App Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($ringgroups)===0)
                                <tr>
                                    <td colspan="7">No Data</td>
                                </tr>
                                @else
                                @foreach($ringgroups as $ringgroup)
                                <tr class="text-center">
                                    <td>{{$ringgroup['NAME']}}</td>
                                    <td>{{$ringgroup['DESCRIPTION']}}</td>
                                    <td>{{$ringgroup['CLIPREFIX']}}</td>
                                    <td>{{$ringgroup['RINGTIME']}}</td>
                                    <td>{{$ringgroup['FAILOVERAPP']}}</td>
                                    <td>{{$ringgroup['FAILOVERAPPNUMBER']}}</td>
                                    <td>
                                        <a href="" title="Add Extensions" class="mx-2">
                                            <i class="fas fa-plus-circle"></i>
                                        </a>
                                        <a href="" title="Edit Ring Group">
                                            <i class="far fa-edit text-info"></i>
                                        </a>
                                        <span class="ml-2 cursor-pointer" onclick="window.confirm(
                                            document.getElementById('').submit()
                                        );" title="Delete Ring Group">
                                            <i class="fas fa-trash text-danger"></i>
                                        </span>
                                        <form action="" method="post">
                                            @csrf
                                            @method('delete')
                                        </form>
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

    <!-- Add extension model shows here -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="height: auto;">
            <div class="modal-content">

                <div class="modal-body">
                    <h3>Add Ring Group</h3>
                    <form action="{{route('prison.extensions.add')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="ringgroupname">Ring Group Name</label>
                            <input type="text" name="name" class="form-control" id="extension"
                                placeholder="Ring Group Name" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Ring Group Description</label>
                            <input type="text" name="description" class="form-control" id="description"
                                placeholder="Ring Group Description" required>
                        </div>
                        <div class="form-group">
                            <label for="duration">Ring Duration</label>
                            <select name="duration" id="">
                                <option value="10">10 sec</option>
                                <option value="20">20 sec</option>
                                <option value="30">30 sec</option>
                                <option value="40">40 sec</option>
                                <option value="60">60 sec</option>
                                <option value="90">90 sec</option>
                                <option value="120">120 sec</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cli">CLI Prefix</label>
                            <input type="text" name="cli" class="form-control" id="cli" placeholder="CLI Prefix"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="recording">Recording</label>
                            <input type="checkbox" name="recording" class="form-control" id="recording" required>
                        </div>
                        <div class="form-group">
                            <label for="duration">Failure</label>
                            <select name="failure" id="">
                                <option value="HANGUP">HUNGUP</option>
                                <option value="EXTENSION">EXTENSION</option>
                                <option value="RINGGROUP">RINGGROUP</option>
                                <option value="ANNOUNCEMENT">ANNOUNCEMENT</option>
                                <option value="IVR">IVR</option>
                                <option value="VOIVEMAIL">VOIVEMAIL</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection