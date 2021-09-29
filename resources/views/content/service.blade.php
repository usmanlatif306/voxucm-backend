@extends('layouts.admin') @section('content')
<div class="bg-white mt-2 py-3">
    <h1 class="text-center pb-3">Services</h1>
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
            action="{{route('content.service.update',$service->id)}}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="form-group">
                <input
                    type="text"
                    name="service_head_1"
                    class="form-control"
                    value="{{ $service->service_head_1 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="service_detail_1"
                    class="form-control"
                    rows="3"
                    >{{ $service->service_detail_1}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="service_head_2"
                    class="form-control"
                    value="{{ $service->service_head_2 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="service_detail_2"
                    class="form-control"
                    rows="3"
                    >{{ $service->service_detail_2}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="ser_head_1"
                    class="form-control"
                    value="{{ $service->ser_head_1 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="ser_detail_1"
                    class="form-control"
                    rows="3"
                    >{{ $service->ser_detail_1}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="ser_head_2"
                    class="form-control"
                    value="{{ $service->ser_head_2 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="ser_detail_2"
                    class="form-control"
                    rows="3"
                    >{{ $service->ser_detail_2}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="ser_head_3"
                    class="form-control"
                    value="{{ $service->ser_head_3 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="ser_detail_3"
                    class="form-control"
                    rows="3"
                    >{{ $service->ser_detail_3}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="ser_head_4"
                    class="form-control"
                    value="{{ $service->ser_head_4 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="ser_detail_4"
                    class="form-control"
                    rows="3"
                    >{{ $service->ser_detail_4}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="ser_head_5"
                    class="form-control"
                    value="{{ $service->ser_head_5 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="ser_detail_5"
                    class="form-control"
                    rows="3"
                    >{{ $service->ser_detail_5}}</textarea
                >
            </div>
            <!-- <div class="form-group">
                <input
                    type="text"
                    name="ser_head_6"
                    class="form-control"
                    value="{{ $service->ser_head_6 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="ser_detail_6"
                    class="form-control"
                    rows="3"
                    >{{ $service->ser_detail_6}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="ser_head_7"
                    class="form-control"
                    value="{{ $service->ser_head_7 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="ser_detail_7"
                    class="form-control"
                    rows="3"
                    >{{ $service->ser_detail_7}}</textarea
                >
            </div> -->
            <div class="form-group">
                <input
                    type="text"
                    name="service_head_2_head1"
                    class="form-control"
                    value="{{ $service->service_head_2_head1 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="service_detail_2_detail1"
                    class="form-control"
                    rows="3"
                    >{{ $service->service_detail_2_detail1}}</textarea
                >
            </div>
            <div class="form-group">
                <input
                    type="text"
                    name="service_head_2_head2"
                    class="form-control"
                    value="{{ $service->service_head_2_head2 }}"
                />
            </div>

            <div class="form-group">
                <textarea
                    type="text"
                    name="service_detail_2_detail2"
                    class="form-control"
                    rows="3"
                    >{{ $service->service_detail_2_detail2}}</textarea
                >
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control" />
            </div>
            <div class="form-group">
                <input type="file" name="image1" class="form-control" />
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
