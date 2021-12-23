@extends('layouts.master')@section('title', 'DID') @section('content')
@include('prison.dashboard.bread')
<div class="container pt-40 pb-40">
    <div class="row">
        <div class="col-12 col-md-3">@include('prison.dashboard.nav')</div>
        <div class="col-12 col-md-9">
            <div class="border rounded ml-md-4 mt-3 mt-md-0">
                <div class="card__header p-2 d-flex justify-content-between">
                    Purchase New DID
                    <a href="{{route('prison.did.index')}}" class="btn btn-sm btn-primary">Back</a>
                </div>
                <div class="py-2 px-3">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover tenant-dash mt-3">
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