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
                    <h3>Peckages</h3>
                    <a href="{{route('admin.products.create')}}" class="btn btn-sm btn-success font-large">New
                        Peckages</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Peckage Name</th>
                                    <th class="text-center">#Lines</th>
                                    <th class="text-center">#Minutes</th>
                                    <th class="text-center">Expiry</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->lines}}</td>
                                    <td>{{$product->minutes}}</td>
                                    <td>{{$product->month}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->status===1?'Active':'Disable'}}</td>
                                    <td>
                                        <a href="{{route('admin.products.edit',$product->id)}}" title="Edit Peckage"><i
                                                class="fas fa-edit"></i></a>
                                        <span class="mx-2 pointer" title="Delete Peckage" onclick="window.confirm(
                                            document.getElementById('product-{{$product->id}}').submit()
                                        );"><i class="fas fa-trash text-danger"></i></span>
                                        <form action="{{route('admin.products.destroy',$product->id)}}" method="post"
                                            id='product-{{$product->id}}'>
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection