@extends('layouts.master')@section('title', 'Service') @section('content')
<!-- breadcrumbs start -->
<section class="breadcrumbs-area pt-200 pb-140 bg-1 bg-blue fix">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title">services</h2>
                    <ul>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                        <li>services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumbs end -->
<!-- service Area Start -->
<div id="service" class="feature-area bg-light pt-90 pb-60 fix">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-8">
                <div class="section-title">
                    <h2>{{$service->service_head_1}}</h2>
                    <p>
                        {{$service->service_detail_1}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="feature-image-content">
                    <div
                        class="about-image wow fadeInLeft"
                        data-wow-duration="2s"
                        data-wow-delay=".3s"
                    >
                        <img
                            src="{{ asset('/storage/images/'.$service->image) }}"
                            alt="image"
                            class="floatright"
                        />
                    </div>
                </div>
                <div
                    class="feature-text-content wow fadeInRight"
                    data-wow-duration="2s"
                    data-wow-delay="2s"
                >
                    <div class="feature-wrapper">
                        <div class="single-feature">
                            <div class="feature-icon">
                                <i class="fa fa-bar-chart"></i>
                            </div>
                            <div class="feature-text">
                                <h3>{{$service->ser_head_1}}</h3>
                                <p>
                                    {{$service->ser_detail_1}}
                                </p>
                            </div>
                        </div>
                        <div class="single-feature">
                            <div class="feature-icon">
                                <i class="fa fa-headphones"></i>
                            </div>
                            <div class="feature-text">
                                <h3>{{$service->ser_head_2}}</h3>
                                <p>
                                    {{$service->ser_detail_2}}
                                </p>
                            </div>
                        </div>
                        <div class="single-feature">
                            <div class="feature-icon">
                                <i class="fa fa-ioxhost"></i>
                            </div>
                            <div class="feature-text">
                                <h3>{{$service->ser_head_3}}</h3>
                                <p>
                                    {{$service->ser_detail_3}}
                                </p>
                            </div>
                        </div>
                        <div class="single-feature">
                            <div class="feature-icon">
                                <i class="fa fa-headphones"></i>
                            </div>
                            <div class="feature-text">
                                <h3>{{$service->ser_head_4}}</h3>
                                <p>
                                    {{$service->ser_detail_4}}
                                </p>
                            </div>
                        </div>
                        <div class="single-feature">
                            <div class="feature-icon">
                                <i class="fa fa-ioxhost"></i>
                            </div>
                            <div class="feature-text">
                                <h3>{{$service->ser_head_5}}</h3>
                                <p>
                                    {{$service->ser_detail_5}}
                                </p>
                            </div>
                        </div>
                        <!-- <div class="single-feature">
                            <div class="feature-icon">
                                <i class="fa fa-ioxhost"></i>
                            </div>
                            <div class="feature-text">
                                <h3>{{$service->ser_head_6}}</h3>
                                <p>
                                    {{$service->ser_detail_6}}
                                </p>
                            </div>
                        </div>
                        <div class="single-feature">
                            <div class="feature-icon">
                                <i class="fa fa-ioxhost"></i>
                            </div>
                            <div class="feature-text">
                                <h3>{{$service->ser_head_7}}</h3>
                                <p>
                                    {{$service->ser_detail_7}}
                                </p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service Area End -->
<!-- Service Business Area Start -->
<div class="service-business-area fix">
    <div class="container">
        <div class="service-left">
            <div class="service-title">
                <h2>{{$service->service_head_2}}</h2>
                <p>
                    {{$service->service_detail_2}}
                </p>
            </div>
            <div class="service-content fix">
                <div class="single-feature">
                    <div class="feature-icon">
                        <i class="fa fa-ioxhost"></i>
                    </div>
                    <div class="feature-text">
                        <h3>{{ $service->service_head_2_head1 }}</h3>
                        <p>
                            {{$service->service_detail_2_detail1}}
                        </p>
                    </div>
                </div>
                <div class="single-feature">
                    <div class="feature-icon">
                        <i class="fa fa-ioxhost"></i>
                    </div>
                    <div class="feature-text">
                        <h3>{{$service->service_head_2_head2}}</h3>
                        <p>
                            {{$service->service_detail_2_detail2}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="button-link">
                <a href="#" class="default-btn">Register</a>
                <a href="#" class="service">Try Our Free Service</a>
            </div>
        </div>
        <div class="service-right">
            <img
                src="{{ asset('/storage/images/'.$service->image1) }}"
                alt="image"
            />
        </div>
    </div>
</div>
<!-- Service Business Area End -->
@endsection
