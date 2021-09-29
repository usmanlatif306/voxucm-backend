@extends('layouts.admin') @section('content')
<div class="bg-white mt-2 py-3">
    <h1 class="text-center pb-3">FAQ</h1>
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
        <form
            action="{{route('content.faq.update',$faq->id)}}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="form-group">
                <input
                    type="text"
                    name="intro_title"
                    class="form-control"
                    value="{{ $faq->intro_title }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="intro1"
                    class="form-control"
                    rows="5"
                    >{{ $faq->intro1}}</textarea
                >
            </div>
            <div class="form-group">
                <textarea
                    type="text"
                    name="intro2"
                    class="form-control"
                    rows="5"
                    >{{ $faq->intro2}}</textarea
                >
            </div>
            <div class="form-group">
                <textarea
                    type="text"
                    name="intro3"
                    class="form-control"
                    rows="5"
                    >{{ $faq->intro3}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="q1"
                    class="form-control"
                    value="{{ $faq->q1 }}"
                />
            </div>
            <div class="form-group">
                <textarea
                    type="text"
                    name="ans1"
                    class="form-control"
                    rows="5"
                    >{{ $faq->ans1}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="q2"
                    class="form-control"
                    value="{{ $faq->q2 }}"
                />
            </div>
            <div class="form-group">
                <textarea
                    type="text"
                    name="ans2"
                    class="form-control"
                    rows="5"
                    >{{ $faq->ans2}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="q3"
                    class="form-control"
                    value="{{ $faq->q3 }}"
                />
            </div>
            <div class="form-group">
                <textarea
                    type="text"
                    name="ans3"
                    class="form-control"
                    rows="5"
                    >{{ $faq->ans3}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="q4"
                    class="form-control"
                    value="{{ $faq->q4 }}"
                />
            </div>
            <div class="form-group">
                <textarea
                    type="text"
                    name="ans4"
                    class="form-control"
                    rows="5"
                    >{{ $faq->ans4}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="q5"
                    class="form-control"
                    value="{{ $faq->q5 }}"
                />
            </div>
            <div class="form-group">
                <textarea
                    type="text"
                    name="ans5"
                    class="form-control"
                    rows="5"
                    >{{ $faq->ans5}}</textarea
                >
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control" />
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
