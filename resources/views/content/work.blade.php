@extends('layouts.admin') @section('content')
<div class="bg-white mt-2 py-3">
    <h1 class="text-center pb-3">Home</h1>
    <div class="w-50 mx-auto">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session("success") }}
        </div>
        @endif
        <form action="{{route('content.work.update',$work->id)}}" method="post">
            @csrf
            <div class="form-group">
                <textarea
                    type="text"
                    name="work1"
                    class="form-control"
                    rows="5"
                    >{{ $work->work1}}</textarea
                >
            </div>
            <div class="form-group">
                <textarea
                    type="text"
                    name="work2"
                    class="form-control"
                    rows="5"
                    >{{ $work->work2}}</textarea
                >
            </div>
            <div class="form-group">
                <textarea
                    type="text"
                    name="work3"
                    class="form-control"
                    rows="5"
                    >{{ $work->work3}}</textarea
                >
            </div>
            <div class="form-group">
                <textarea
                    type="text"
                    name="work4"
                    class="form-control"
                    rows="5"
                    >{{ $work->work4}}</textarea
                >
            </div>
            <div class="form-group">
                <textarea
                    type="text"
                    name="work5"
                    class="form-control"
                    rows="5"
                    >{{ $work->work5}}</textarea
                >
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
