@extends('layouts.admin') @section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session("success") }}
            </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Promo Codes</h3>
                    <a href="{{route('admin.promos.create')}}" class="btn btn-sm btn-success font-large">New
                        Promo Code</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Code</th>
                                    <th class="text-center">Discount (%)</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($promos as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->value}}</td>
                                    <td>{{$product->status===1?'Active':'Disable'}}</td>
                                    <td>
                                        <a href="{{route('admin.promos.edit',$product->id)}}" title="Edit Peckage"><i
                                                class="fas fa-edit"></i></a>
                                        <span class="mx-2 pointer" title="Delete Peckage" onclick="window.confirm(
                                            document.getElementById('product-{{$product->id}}').submit()
                                        );"><i class="fas fa-trash text-danger"></i></span>
                                        <form action="{{route('admin.promos.destroy',$product->id)}}" method="post"
                                            id='product-{{$product->id}}'>
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{$promos->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection