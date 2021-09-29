@extends('layouts.master')@section('title', 'About Us') @section('content')
<!-- breadcrumbs start -->
<section class="breadcrumbs-area pt-200 pb-140 bg-1 bg-blue fix">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title">About Us</h2>
                    <ul>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                        <li>about us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumbs end -->
<!-- About Us Start -->
<div id="about" class="feature-area bg-light pt-40 pb-60 fix">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 about">{!! $about->content !!}</div>
            <div class="col-12 col-md-4 pt-40">
                <img
                    src="{{ asset('/storage/images/'.$about->image) }}"
                    alt=""
                    class="img-fluid"
                />
            </div>
        </div>
    </div>
</div>
<!-- About Us End -->
@endsection
