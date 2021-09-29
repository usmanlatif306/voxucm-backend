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
                    <form id="contact-form" action="mail.php" method="post">
                        <input name="name" type="text" placeholder="Name" />
                        <input name="email" type="text" placeholder="Email" />
                        <textarea
                            name="message"
                            placeholder="Your message"
                        ></textarea>
                        <input class="submit" type="submit" value="SUBMIT" />
                    </form>
                    <p class="form-messege"></p>
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
