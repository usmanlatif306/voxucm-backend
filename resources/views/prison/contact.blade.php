@extends('layouts.master')@section('title', 'Contact Us') @section('content')
<!-- breadcrumbs start -->
<section class="breadcrumbs-area pt-200 pb-140 bg-1 bg-blue fix">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title">contact us</h2>
                    <ul>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                        <li>contact us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumbs end -->
<!-- Contact Us -->
<div id="contact" class="contact-area bg-light pt-100">
    <div class="container">
        <div class="section-title text-center">
            <h2>Contact Us</h2>
        </div>
        <div class="row">
            <div class="offset-lg-2 col-lg-8 text-center">
                <div class="contact-from">
                    <form id="contactForm" action="{{route('send_contact_message')}}" method="post">
                        @csrf
                        <input name="name" type="text" placeholder="Name" required />
                        <input name="email" type="text" placeholder="Email" required />
                        <textarea name="message" placeholder="Your message" required></textarea>
                        {!! htmlFormSnippet() !!}
                        <input class="submit" style="cursor:pointer" type="submit" value="Submit" />
                    </form>
                    <div id="alertMesg" class="alert mt-3 d-none">
                    </div>
                </div>
            </div>
        </div>
        <div class="conatct-info fix">
            <div class="row">
                <div class="col-lg-4 col-md-4 text-center">
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="contact-text">
                            <span> {{$contact->number}} </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                    <div class="single-contact-info res-xs2">
                        <div class="contact-icon">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                        </div>
                        <div class="contact-text">
                            <span>
                                <a href="#">{{$contact->email}}</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 text-center">
                    <div class="single-contact-info">
                        <div class="contact-icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="contact-text">
                            <span>
                                {{$contact->address1}}
                                <br />
                                {{$contact->address2}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="map-area">
    <div class="contact-map">
        <div id="hastech"></div>
    </div>
</div>
<!-- Contact Us end-->
@endsection

@push('scripts')
<script>
    $('#contactForm').on('submit', function (e) {
        e.preventDefault();
        $('#alertMesg').addClass('d-none');
        $(".submit").attr("disabled", true);
        $('.submit').val('Sending...');
        let url = $(this).attr('action');
        $.ajax({
            url: url,
            type: "POST",
            data: $(this).serialize(),
            success: function (response) {
                // console.log(response)
                $('#alertMesg').removeClass('d-none');
                $('#alertMesg').removeClass('alert-danger');
                $('#alertMesg').addClass('alert-success');
                $('#alertMesg').text('Message has been send');
                $('.submit').val('Submit');
                $(".submit").attr("disabled", false);
                document.getElementById("contactForm").reset();
            },
            error: function (err) {
                // console.log(err.responseJSON.message)
                $('.submit').val('Submit');
                $(".submit").attr("disabled", false);
                $('#alertMesg').removeClass('d-none');
                $('#alertMesg').removeClass('alert-success');
                $('#alertMesg').addClass('alert-danger');
                $('#alertMesg').text(err.responseJSON.message);
            }
        });
    })
</script>
@endpush