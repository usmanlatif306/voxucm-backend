@extends('layouts.account')@section('title', 'DID') @section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
            <div class="alert alert-success ml-md-4">
                {!! session('success') !!}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger ml-md-4">
                {!! session('error') !!}
            </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="m-0 p-0">Purchase New DID</h3>
                    <a href="{{route('prison.did.index')}}" class="btn btn-sm btn-primary">Back</a>
                </div>
                <div class="py-2 px-3">
                    <!-- extension list here -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tenant-dash mt-3">
                            <thead>
                                <tr class="tableheading" style="text-align: center;">
                                    <th>No</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cities as $city)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$city->state}}</td>
                                    <td>{{$city->name}}</td>
                                    <td><a href="{{route('prison.did.dids',$city->id)}}">select</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $cities->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection