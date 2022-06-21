@extends('layouts.admin') @section('content')
<div class="bg-white mt-2 py-3">
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
        <form action="{{route('content.faq.update',$faq->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Faq Heading</label>
                <input type="text" name="faq_heading" class="form-control" value="{{ $faq->faq_heading }}"
                    placeholder="Faq Heading" />
            </div>

            <div class="form-group">
                <label for="">Faq Title</label>
                <input type="text" name="faq_title" class="form-control" placeholder="Faq Tilte"
                    value="{{ $faq->faq_title}}"></input>
            </div>
            <div class="form-group">
                <label for="">Faq About</label>
                <textarea type="text" name="faq_about" class="form-control" placeholder="Faq About" rows="3"
                    value="">{{ $faq->faq_about}}</textarea>
            </div>
            <div class="form-group">
                <label for="">Faq Section Image</label>
                <input type="file" name="image" class="form-control" />
                <small>Don't update if you want to show old image</small>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <h3>Faqs</h3>
                <span id="addNew" class="pointer pt-2" title="Add New Faq"><i
                        class="fas fa-plus-circle fa-2x text-primary"></i></span>
            </div>
            <div id="faqGroup" class="">
                @foreach($faqs as $question=>$answer)
                <div class="form-group">
                    <input type="text" name="question[]" class="form-control" value="{{$question}}" />
                </div>
                <div class="form-group">
                    <textarea name="answer[]" rows="5" class="form-control">{{$answer}}
                    </textarea>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('#addNew').on('click', function () {
        $('#faqGroup').append('<div class="form-group"><input type="text" name="question[]" class="form-control" placeholder="Question" /></div><div class="form-group"><textarea name="answer[]" class="form-control" rows="3" placeholder="Answer"></textarea></div>');
    });
</script>
@endpush