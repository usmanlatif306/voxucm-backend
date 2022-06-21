@extends('layouts.master')@section('title', 'Support') @section('content')
<!-- breadcrumbs start -->
<section class="breadcrumbs-area pt-200 pb-140 bg-1 bg-blue fix">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title">support</h2>
                    <ul>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                        <li>support</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumbs end -->
<!-- FAQ Area Start -->
<div id="support" class="faq-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="faq-left-sec">
                    <div class="faq-title-image fix">
                        <div class="faq-title">
                            <h2>{{$faq->faq_heading}} :</h2>
                            <h3>{{$faq->faq_title}}</h3>
                        </div>
                        <div class="faq-image">
                            <img src="{{ asset('/storage/images/'.$faq->image) }}" alt="" />
                        </div>
                    </div>
                    <div class="pb-4 fix">
                        <p>
                            {{$faq->faq_about}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7 mt-sm-30">
                <div class="accordion" id="accordionExample">
                    @foreach($faqs as $question=>$answer)
                    <div class="card">
                        <div class="card-header" id="heading{{$loop->iteration}}">
                            <h4 class="card-title">
                                <a role="button" data-toggle="collapse" aria-expanded="true"
                                    href="#faq{{$loop->iteration}}" aria-controls="faq{{$loop->iteration}}">
                                    <span></span> {{$question}}
                                </a>
                            </h4>
                        </div>
                        <div id="faq{{$loop->iteration}}" class="collapse {{$loop->iteration === 1 ? 'show' :''}}"
                            role="tabpanel" aria-labelledby="heading{{$loop->iteration}}"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <p>
                                    {{$answer}}
                                </p>
                                <span class="arrow"></span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- <div class="card">
                        <div class="card-header" id="headingOne">
                            <h4 class="card-title">
                                <a role="button" data-toggle="collapse" aria-expanded="true" href="#one"
                                    aria-controls="one">
                                    <span></span> {{$faq->q1}}
                                </a>
                            </h4>
                        </div>
                        <div id="one" class="collapse show" role="tabpanel" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
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
                                <a class="collapsed" data-toggle="collapse" aria-expanded="false" href="#two"
                                    aria-controls="two">
                                    <span></span> {{$faq->q2}}
                                </a>
                            </h4>
                        </div>
                        <div id="two" class="collapse" role="tabpanel" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
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
                                <a class="collapsed" data-toggle="collapse" aria-expanded="false" href="#three"
                                    aria-controls="three">
                                    <span></span> {{$faq->q3}}
                                </a>
                            </h4>
                        </div>
                        <div id="three" class="collapse" role="tabpanel" aria-labelledby="headingThree"
                            data-parent="#accordionExample">
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
                                <a class="collapsed" data-toggle="collapse" aria-expanded="false" href="#four"
                                    aria-controls="four">
                                    <span></span> {{$faq->q4}}
                                </a>
                            </h4>
                        </div>
                        <div id="four" class="collapse" role="tabpanel" aria-labelledby="headingFour"
                            data-parent="#accordionExample">
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
                                <a class="collapsed" data-toggle="collapse" aria-expanded="false" href="#five"
                                    aria-controls="five">
                                    <span></span> {{$faq->q5}}
                                </a>
                            </h4>
                        </div>
                        <div id="five" class="collapse" role="tabpanel" aria-labelledby="headingFive"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                <p>
                                    {{$faq->ans5}}
                                </p>
                                <span class="arrow"></span>
                            </div>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- FAQ Area End -->
@endsection