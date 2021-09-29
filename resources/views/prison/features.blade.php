@extends('layouts.master') @section('title', 'Features') @section('content')
<!-- breadcrumbs start -->
<section class="breadcrumbs-area pt-200 pb-140 bg-1 bg-blue fix">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title">Features</h2>
                    <ul>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                        <li>Features</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumbs end -->
<!-- feature Area Start -->
<div id="feature" class="service-area bg-2 pb-50">
    <div class="container">
        <div class="service-section">
            <div class="row">
                <div
                    class="
                        offset-xl-6
                        col-xl-6 col-lg-8
                        offset-lg-4
                        col-md-12 col-12
                    "
                >
                    <div class="service-container">
                        <h2>Why Chose Us</h2>
                        <div class="service-column">
                            <div class="service-item">
                                <h3>{{$feature->heading1}}</h3>
                                <p>
                                    {{$feature->detail1}}
                                </p>
                            </div>
                            <div class="service-item">
                                <h3>{{$feature->heading2}}</h3>
                                <p>
                                    {{$feature->detail2}}
                                </p>
                            </div>
                            <div class="service-item">
                                <h3>{{$feature->heading3}}</h3>
                                <p>
                                    {{$feature->detail3}}
                                </p>
                            </div>
                            <div class="service-item">
                                <h3>{{$feature->heading4}}</h3>
                                <p>
                                    {{$feature->detail4}}
                                </p>
                            </div>
                            <div class="service-item">
                                <h3>{{$feature->heading5}}</h3>
                                <p>
                                    {{$feature->detail5}}
                                </p>
                            </div>
                            <div class="service-item">
                                <h3>{{$feature->heading6}}</h3>
                                <p>
                                    {{$feature->detail6}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- feature Area End -->

@endsection
