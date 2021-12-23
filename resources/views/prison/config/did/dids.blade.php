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
                                    <th>City</th>
                                    <th>Dialing Code</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($dids) ===0)
                                <tr class="text-center">
                                    <td colspan="9">No Data</td>
                                </tr>
                                @else
                                @foreach($dids as $did)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$did->city->name}}</td>
                                    <td>{{$did->dialing_code}}</td>
                                    <td>£{{$did->price}}</td>
                                    <td>
                                        <a href="{{route('prison.did.purchase',$did->id)}}">select</a>
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
</div>
@endsection