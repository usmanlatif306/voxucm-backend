@extends('layouts.admin') @section('content')
<div class="bg-white mt-2 py-3">
    <h1 class="text-center border-bottom">Home</h1>
    <div class="w-75 mx-auto">
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
        <!-- Navbar Logo -->
        <h3 class="text-center py-2">Nav Logo</h3>
        <form
            action="{{route('content.nav.update',$home->id)}}"
            method="post"
            enctype="multipart/form-data"
            class="border-bottom mb-3"
        >
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="form-group">
                        <input
                            type="file"
                            name="navlogo"
                            class="form-control"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <button type="submit" class="btn btn-primary w-100">
                        Save
                    </button>
                </div>
            </div>
        </form>
        <!-- Home Top Header Section -->
        <h3 class="text-center py-2">Top Header Section</h3>
        <form
            action="{{route('content.home.update',$home->id)}}"
            method="post"
            enctype="multipart/form-data"
            class="border-bottom mb-3"
        >
            @csrf
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="form-group">
                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            value="{{ $home->title }}"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <div class="form-group">
                        <input
                            type="text"
                            name="button1"
                            class="form-control"
                            value="{{ $home->button1 }}"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <div class="form-group">
                        <input
                            type="text"
                            name="button2"
                            class="form-control"
                            value="{{ $home->button2 }}"
                        />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <textarea
                            type="text"
                            name="detail"
                            class="form-control"
                            rows="5"
                            >{{ $home->detail}}</textarea
                        >
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="form-group">
                        <input type="file" name="image" class="form-control" />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <button type="submit" class="btn btn-primary w-100">
                        Save
                    </button>
                </div>
            </div>
        </form>
        <!-- Home News Letter Section -->
        <h3 class="text-center py-2">News Letter</h3>
        <form
            action="{{route('content.news.update',$news->id)}}"
            method="post"
            class="border-bottom mb-3"
        >
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            value="{{ $news->title }}"
                            placeholder="Title"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="descrip"
                            class="form-control"
                            value="{{ $news->descrip }}"
                            placeholder="Description"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <input
                            type="text"
                            name="ser1"
                            class="form-control"
                            value="{{ $news->ser1 }}"
                            placeholder="Service 1"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <input
                            type="text"
                            name="ser1_count"
                            class="form-control"
                            value="{{ $news->ser1_count }}"
                            placeholder="Service 1 Count"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <input
                            type="text"
                            name="ser2"
                            class="form-control"
                            value="{{ $news->ser2 }}"
                            placeholder="Service 2"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <input
                            type="text"
                            name="ser2_count"
                            class="form-control"
                            value="{{ $news->ser2_count }}"
                            placeholder="Service 2 Count"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <input
                            type="text"
                            name="ser3"
                            class="form-control"
                            value="{{ $news->ser3 }}"
                            placeholder="Service 3"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <input
                            type="text"
                            name="ser3_count"
                            class="form-control"
                            value="{{ $news->ser3_count }}"
                            placeholder="Service 3 Count"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <input
                            type="text"
                            name="ser4"
                            class="form-control"
                            value="{{ $news->ser4 }}"
                            placeholder="Service 4"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <input
                            type="text"
                            name="ser4_count"
                            class="form-control"
                            value="{{ $news->ser4_count }}"
                            placeholder="Service 4 Count"
                        />
                    </div>
                </div>
                <div class="text-center w-100 pb-3">
                    <button type="submit" class="btn btn-primary w-25">Save</button>
                </div>
            </div>
        </form>
        <!-- Home News Letter Section -->
        <h3 class="text-center py-2">Test Call Section</h3>
        <form
            action="{{route('content.call.update',$call->id)}}"
            method="post"
            class="border-bottom mb-3"
        >
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            value="{{ $call->title }}"
                            placeholder="Title"
                        />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <textarea
                            name="detail"
                            class="form-control"
                            placeholder="Detail"
                            rows="4"
                            >{{ $call->detail }}</textarea
                        >
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <input
                            type="text"
                            name="btn1"
                            class="form-control"
                            value="{{ $call->btn1 }}"
                            placeholder="Button Text"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <input
                            type="text"
                            name="btn2"
                            class="form-control"
                            value="{{ $call->btn2 }}"
                            placeholder="Button Text"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-4 pb-3">
                    <button type="submit" class="btn btn-primary w-100">
                        Save
                    </button>
                </div>
            </div>
        </form>
        <!-- Testinomials -->
        <h3 class="text-center py-2">Testimonials</h3>
        <form
            action="{{route('content.test.update',$test->id)}}"
            method="post"
            class="border-bottom mb-3"
        >
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="test1_name"
                            class="form-control"
                            value="{{ $test->test1_name }}"
                            placeholder="Name"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="test1_des"
                            class="form-control"
                            value="{{ $test->test1_des }}"
                            placeholder="Designation"
                        />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <textarea
                            type="text"
                            name="test1_rev"
                            class="form-control"
                            rows="5"
                            placeholder="Reviews"
                            >{{ $test->test1_rev }}</textarea
                        >
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="test2_name"
                            class="form-control"
                            value="{{ $test->test2_name }}"
                            placeholder="Name"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="test2_des"
                            class="form-control"
                            value="{{ $test->test2_des }}"
                            placeholder="Designation"
                        />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <textarea
                            type="text"
                            name="test2_rev"
                            class="form-control"
                            rows="5"
                            placeholder="Reviews"
                            >{{ $test->test2_rev }}</textarea
                        >
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="test3_name"
                            class="form-control"
                            value="{{ $test->test3_name }}"
                            placeholder="Name"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="test3_des"
                            class="form-control"
                            value="{{ $test->test3_des }}"
                            placeholder="Designation"
                        />
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <textarea
                            type="text"
                            name="test3_rev"
                            class="form-control"
                            rows="5"
                            placeholder="Reviews"
                            >{{ $test->test3_rev }}</textarea
                        >
                    </div>
                </div>
                <div class="text-center w-100">
                    <button type="submit" class="btn btn-primary w-25">
                        Save
                    </button>
                </div>
            </div>
        </form>
        <!-- End of Testinomials -->
        <!-- Contact -->
        <h3 class="text-center py-2">Contact</h3>
        <form
            action="{{ route('content.contact.update',$contact->id) }}"
            method="post"
            class="border-bottom mb-3"
        >
            @csrf
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <input
                            type="text"
                            name="email"
                            class="form-control"
                            value="{{$contact->email}}"
                            placeholder="Email"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <input
                            type="text"
                            name="number"
                            class="form-control"
                            value="{{$contact->number}}"
                            placeholder="Number"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <input
                            type="text"
                            name="address1"
                            class="form-control"
                            value="{{$contact->address1}}"
                            placeholder="First Address"
                        />
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <input
                            type="text"
                            name="address2"
                            class="form-control"
                            value="{{$contact->address2}}"
                            placeholder="Last Address"
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
        <!-- End of Contact -->
    </div>
</div>
@endsection
