@extends('layouts.admin') @section('content')
<div class="bg-white mt-2 py-3">
    <h1 class="text-center pb-3">About</h1>
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
            action="{{route('content.about.update',$about->id)}}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="form-group">
                <textarea
                    type="text"
                    name="content"
                    id="content"
                    class="form-control"
                    >{{$about->content}}</textarea
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
@endsection @push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector("#content")).catch((error) => {
        console.error(error);
    });
</script>
@endpush
