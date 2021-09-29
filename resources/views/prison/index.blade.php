@extends('layouts.master')@section('title', 'Home') @section('content')
<!-- Banner Area Start -->
<div id="banner" class="banner-area bg-blue bg-1 fix">
    <div class="container-fluid">
        <div class="banner-image-wrapper">
            <div class="banner-image">
                <div class="banner-image-cell">
                    <img
                        src="{{ asset('/storage/images/'.$home->image) }}"
                        alt="image"
                    />
                    <!-- banner/2.png -->
                </div>
            </div>
        </div>
        <div class="banner-text">
            <div class="text-content-wrapper">
                <div class="text-content">
                    <h1 class="title1">
                        {{$home->title}}
                    </h1>
                    <p>
                        {{$home->detail}}
                    </p>
                    <div class="banner-button">
                        <a
                            class="default-btn button"
                            href="#"
                            >{{$home->button1}}</a
                        >
                        <a
                            class="default-btn button"
                            href="#"
                            >{{$home->button2}}</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End -->
<!-- feature Area Start -->
<div id="feature" class="service-area bg-2">
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
<!-- Newsletter Fun Area Strat -->
<div class="newsletter-fun-area">
    <div class="newsletter-area">
        <div class="newsletter-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-11 offset-xl-1 col-lg-12 col-12">
                        <div class="newsletter-container">
                            <div class="newsletter-info">
                                <h3>{{$news->title}}</h3>
                                <h3 class="text-light">
                                    {{$news->descrip}}
                                </h3>
                            </div>
                            <div class="newsletter-form">
                                <form
                                    action="#"
                                    id="mc-form"
                                    class="mc-form fix"
                                >
                                    <input
                                        id="mc-email"
                                        type="email"
                                        name="email"
                                        placeholder="Enter your E-mail"
                                    />
                                    <button id="mc-submit" type="submit">
                                        <i class="fa fa-send"></i>
                                    </button>
                                </form>
                                <!-- mailchimp-alerts Start -->
                                <div class="mailchimp-alerts">
                                    <div class="mailchimp-submitting"></div>
                                    <!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success"></div>
                                    <!-- mailchimp-success end -->
                                    <div class="mailchimp-error"></div>
                                    <!-- mailchimp-error end -->
                                </div>
                                <!-- mailchimp-alerts end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fun-factor-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="single-fun-factor">
                        <div class="fun-icon"><i class="fa fa-users"></i></div>
                        <h4>{{$news->ser1}}</h4>
                        <h5>
                            <span class="counter">{{$news->ser1_count}}</span
                            >K
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="single-fun-factor">
                        <div class="fun-icon"><i class="fa fa-usb"></i></div>
                        <h4>{{$news->ser2}}</h4>
                        <h5>
                            <span class="counter">{{$news->ser2_count}}</span
                            >K
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="single-fun-factor">
                        <div class="fun-icon"><i class="fa fa-server"></i></div>
                        <h4>{{$news->ser3}}</h4>
                        <h5>
                            <span class="counter">{{$news->ser3_count}}</span
                            >K
                        </h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="single-fun-factor">
                        <div class="fun-icon">
                            <i class="fa fa-paint-brush"></i>
                        </div>
                        <h4>{{$news->ser4}}</h4>
                        <h5>
                            <span class="counter">{{$news->ser4_count}}</span
                            >K
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter Fun Area End -->
<!-- Pricing Area Start -->
<div id="voiprate" class="pricing-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-title text-center">
                    <h2>PRICING PLANS</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($products->slice(0, 4) as $product)
            <div class="col-lg-3 col-md-6 mb-4">
                <form method="POST" action="{{ route('order.save') }}">
                    @csrf
                    <input
                        type="hidden"
                        name="user_id"
                        @auth
                        value="{{auth()->user()->id}}"
                        @endauth
                    />
                    <input
                        type="hidden"
                        name="product_id"
                        value="{{$product->id}}"
                    />
                    <div class="single-table">
                        <div class="table-title">
                            <h4>{{$product->name}}</h4>
                            <h1>£{{$product->price}}/<span>mo</span></h1>
                            <h5>Starting</h5>
                        </div>
                        <div class="table-content">
                            <span>Number of Lines {{$product->lines}}</span>
                            <span
                                >Number of minutes allowed
                                {{$product->numbers}}</span
                            >
                            <span>Plan used for {{$product->month}} Month</span>
                            <button
                                class="default-btn table-btn"
                                type="submit"
                                @guest
                                disabled
                                @endguest
                            >
                                Add Plan
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            @endforeach
        </div>
    </div>
</div>
<!-- Pricing Area End -->
<!-- Make Call Area Start -->
<div class="make-call-area">
    <div class="make-call-title bg-light pt-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-9">
                    <div class="section-title">
                        <h2>
                            {{ $call->title }}
                        </h2>
                        <p>
                            {{ $call->detail }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="make-call-registration bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Call Registration</h3>
                    <form action="#" method="post">
                        <div class="form-box fix d-flex flex-wrap">
                            <input
                                type="text"
                                name="name"
                                placeholder="Name"
                                required
                            />
                            <input
                                type="email"
                                name="email"
                                placeholder="E-mail"
                                required
                            />
                            <input
                                type="text"
                                name="number"
                                placeholder="Mobile Number"
                            />
                            <select name="price">
                                <option value="110">110$</option>
                                <option value="240">240$</option>
                                <option value="360">360$</option>
                                <option value="400">400$</option>
                                <option value="660">660$</option>
                                <option value="999">999$</option>
                            </select>
                            <button type="submit" class="submit-btn">
                                <i class="fa fa-phone"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-button">
                        <a href="#" class="default-btn">{{ $call->btn1 }}</a>
                        <a href="#" class="default-btn">{{ $call->btn2 }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Make Call Area End -->
<!-- FAQ Area Start -->
<div id="support" class="faq-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="faq-left-sec">
                    <div class="faq-title-image fix">
                        <div class="faq-title">
                            <h2>FAQ :</h2>
                            <h3>{{$faq->intro_title}}</h3>
                        </div>
                        <div class="faq-image">
                            <img
                                src="{{ asset('/storage/images/'.$faq->image) }}"
                                alt=""
                            />
                        </div>
                    </div>
                    <div class="faq-wrapper fix">
                        <p>
                            {{$faq->intro1}}
                        </p>
                        <p>
                            {{$faq->intro2}}
                        </p>
                        <p>
                            {{$faq->intro3}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7 mt-sm-30">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h4 class="card-title">
                                <a
                                    role="button"
                                    data-toggle="collapse"
                                    aria-expanded="true"
                                    href="#one"
                                    aria-controls="one"
                                >
                                    <span></span> {{$faq->q1}}
                                </a>
                            </h4>
                        </div>
                        <div
                            id="one"
                            class="collapse show"
                            role="tabpanel"
                            aria-labelledby="headingOne"
                            data-parent="#accordionExample"
                        >
                            <div class="card-body">
                                <p>
                                    {{$faq->ans1}}
                                </p>
                                <span class="arrow"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h4 class="card-title">
                                <a
                                    class="collapsed"
                                    data-toggle="collapse"
                                    aria-expanded="false"
                                    href="#two"
                                    aria-controls="two"
                                >
                                    <span></span> {{$faq->q2}}
                                </a>
                            </h4>
                        </div>
                        <div
                            id="two"
                            class="collapse"
                            role="tabpanel"
                            aria-labelledby="headingTwo"
                            data-parent="#accordionExample"
                        >
                            <div class="card-body">
                                <p>
                                    {{$faq->ans2}}
                                </p>
                                <span class="arrow"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingThree">
                            <h4 class="card-title">
                                <a
                                    class="collapsed"
                                    data-toggle="collapse"
                                    aria-expanded="false"
                                    href="#three"
                                    aria-controls="three"
                                >
                                    <span></span> {{$faq->q3}}
                                </a>
                            </h4>
                        </div>
                        <div
                            id="three"
                            class="collapse"
                            role="tabpanel"
                            aria-labelledby="headingThree"
                            data-parent="#accordionExample"
                        >
                            <div class="card-body">
                                <p>
                                    {{$faq->ans3}}
                                </p>
                                <span class="arrow"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingFour">
                            <h4 class="card-title">
                                <a
                                    class="collapsed"
                                    data-toggle="collapse"
                                    aria-expanded="false"
                                    href="#four"
                                    aria-controls="four"
                                >
                                    <span></span> {{$faq->q4}}
                                </a>
                            </h4>
                        </div>
                        <div
                            id="four"
                            class="collapse"
                            role="tabpanel"
                            aria-labelledby="headingFour"
                            data-parent="#accordionExample"
                        >
                            <div class="card-body">
                                <p>
                                    {{$faq->ans4}}
                                </p>
                                <span class="arrow"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingFive">
                            <h4 class="card-title">
                                <a
                                    class="collapsed"
                                    data-toggle="collapse"
                                    aria-expanded="false"
                                    href="#five"
                                    aria-controls="five"
                                >
                                    <span></span> {{$faq->q5}}
                                </a>
                            </h4>
                        </div>
                        <div
                            id="five"
                            class="collapse"
                            role="tabpanel"
                            aria-labelledby="headingFive"
                            data-parent="#accordionExample"
                        >
                            <div class="card-body">
                                <p>
                                    {{$faq->ans5}}
                                </p>
                                <span class="arrow"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQ Area End -->
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
<!-- Testimonial Area Start -->
<div class="testimonial-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 text-center">
                <h2>What They say</h2>
                <div class="testimonial-wrapper">
                    <div class="single-testimonial">
                        <h4>
                            <a href="#">{{$test->test1_name}}</a>
                        </h4>
                        <h5>{{$test->test1_des}}</h5>
                        <p>
                            <span>{{$test->test1_rev}}</span>
                        </p>
                    </div>
                    <div class="single-testimonial">
                        <h4>
                            <a href="#">{{$test->test2_name}}</a>
                        </h4>
                        <h5>{{$test->test2_des}}</h5>
                        <p>
                            <span>{{$test->test2_rev}}</span>
                        </p>
                    </div>
                    <div class="single-testimonial">
                        <h4>
                            <a href="#">{{$test->test3_name}}</a>
                        </h4>
                        <h5>{{$test->test3_des}}</h5>
                        <p>
                            <span>{{$test->test3_rev}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Area End -->
<div id="contact" class="contact-area bg-light pt-100">
    <div class="container">
        <div class="section-title text-center">
            <h2>contact us</h2>
            <p></p>
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
                            <span>
                                {{$contact->number}}
                            </span>
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
@endsection
