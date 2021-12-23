@extends('layouts.account')@section('title', 'Day Night') @section('content')

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
                    <h3 class="m-0 p-0">Day Night</h3>
                    <button class="btn btn-sm btn-primary shadow-none" data-toggle="modal" data-target="#exampleModal">
                        Add Day Night</button>
                </div>
                <div class="card-body">
                    <!-- extension list here -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover tenant-dash mt-3">
                            <thead>
                                <tr class="tableheading" style="text-align: center;">
                                    <th>Day Night Name</th>
                                    <th>Open Action</th>
                                    <th>Close Action</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4">No Data</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Voice Mail model shows here -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <h3>Add Voice Mail</h3>
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

@endsection