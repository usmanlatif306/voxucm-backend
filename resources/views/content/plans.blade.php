@extends('layouts.admin') @section('content')
<div class="bg-white mt-2 py-3">
    <h1 class="text-center pb-3">Plans</h1>
    <div class="w-75 mx-auto">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session("success") }}
        </div>
        @endif @foreach($products as $product)
        <form
            action="{{route('content.plan.update',$product->id)}}"
            method="post"
            class="border-bottom mb-3"
        >
            @csrf
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{$product->name}}"
                            placeholder="Plan Name"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <input
                            type="text"
                            name="price"
                            class="form-control"
                            value="{{$product->price}}"
                            placeholder="Plan Price"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <input
                            type="text"
                            name="lines"
                            class="form-control"
                            value="{{$product->lines}}"
                            placeholder="Plan Lines"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <input
                            type="text"
                            name="minutes"
                            class="form-control"
                            value="{{$product->minutes}}"
                            placeholder="Plan Minutes"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <input
                            type="text"
                            name="month"
                            class="form-control"
                            value="{{$product->month}}"
                            placeholder="Plan Month"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <button type="submit" class="btn btn-primary w-100">
                        Save
                    </button>
                </div>
            </div>
        </form>
        @endforeach
    </div>
</div>
@endsection
