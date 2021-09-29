@extends('layouts.admin') @section('content')
<div class="bg-white mt-2 py-3">
    <h1 class="text-center pb-3">Features</h1>
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
            action="{{route('content.feature.update',$feature->id)}}"
            method="post"
        >
            @csrf
            <div class="form-group">
                <input
                    type="text"
                    name="heading1"
                    class="form-control"
                    value="{{ $feature->heading1 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="detail1"
                    class="form-control"
                    rows="3"
                    >{{ $feature->detail1}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="heading2"
                    class="form-control"
                    value="{{ $feature->heading2 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="detail2"
                    class="form-control"
                    rows="3"
                    >{{ $feature->detail2}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="heading3"
                    class="form-control"
                    value="{{ $feature->heading3 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="detail3"
                    class="form-control"
                    rows="3"
                    >{{ $feature->detail3}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="heading4"
                    class="form-control"
                    value="{{ $feature->heading4 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="detail4"
                    class="form-control"
                    rows="3"
                    >{{ $feature->detail4}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="heading5"
                    class="form-control"
                    value="{{ $feature->heading5 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="detail5"
                    class="form-control"
                    rows="3"
                    >{{ $feature->detail5}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="heading6"
                    class="form-control"
                    value="{{ $feature->heading6 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="detail6"
                    class="form-control"
                    rows="3"
                    >{{ $feature->detail6}}</textarea
                >
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
