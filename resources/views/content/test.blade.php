@extends('layouts.admin') @section('content')
<div class="bg-white mt-2 py-3">
    <h1 class="text-center pb-3">Testimonials</h1>
    <div class="w-50 mx-auto">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session("success") }}
        </div>
        @endif @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('content.test.update',$test->id)}}" method="post">
            @csrf
            <div class="form-group">
                <input
                    type="text"
                    name="test1_name"
                    class="form-control"
                    value="{{ $test->test1_name }}"
                />
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="test1_des"
                    class="form-control"
                    value="{{ $test->test1_des }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="test1_rev"
                    class="form-control"
                    rows="5"
                    >{{ $test->test1_rev }}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="test2_name"
                    class="form-control"
                    value="{{ $test->test2_name }}"
                />
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="test2_des"
                    class="form-control"
                    value="{{ $test->test2_des }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="test2_rev"
                    class="form-control"
                    rows="5"
                    >{{ $test->test2_rev }}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="test3_name"
                    class="form-control"
                    value="{{ $test->test3_name }}"
                />
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="test3_des"
                    class="form-control"
                    value="{{ $test->test3_des }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="test3_rev"
                    class="form-control"
                    rows="5"
                    >{{ $test->test3_rev }}</textarea
                >
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
