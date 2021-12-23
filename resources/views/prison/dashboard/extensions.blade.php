@extends('layouts.account')@section('title', 'Extensions') @section('content')

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
                    <h3 class="m-0 p-0">Extensions</h3>
                    <button class="btn btn-sm btn-primary shadow-none" data-toggle="modal"
                        data-target="#exampleModal">Add
                        New
                        Extension</button>
                </div>
                <div class="card-body">
                    <!-- search -->
                    <!-- <div class="row my-3">
                        <div class="col-md-6">
                            <form action="">
                                <input type="text" placeholder="Extesion search"
                                    class="form-control shadow-none border">
                            </form>

                        </div>

                    </div> -->
                    <!-- extension list here -->
                    <div class="table-responsive">

                        <table id="example" class="table table-bordered table-striped table-hover tenant-dash mt-3">
                            <thead>
                                <tr class="tableheading" style="text-align: center;">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Grid row-->
    <div class="row wow fadeIn">
        <!-- Add extension model shows here -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <h3>Add New Extension</h3>
                        <form action="{{route('prison.extension.add')}}" method="POST">
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
    <!--Grid row-->

</div>



@endsection