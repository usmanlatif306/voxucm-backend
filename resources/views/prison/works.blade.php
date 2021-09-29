@extends('layouts.master')@section('title', 'How It Works') @section('content')
<!-- breadcrumbs start -->
<section class="breadcrumbs-area pt-200 pb-140 bg-1 bg-blue fix">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title">how it works</h2>
                    <ul>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                        <li>how it work</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumbs end -->
<!-- Works Start -->
<div id="works" class="feature-area pt-40 pb-60 fix">
    <div class="container text-justify">
        <p>
            {{$work->work1}}
        </p>
        <p>
            {{$work->work2}}
        </p>
        <p>
            {{$work->work3}}
        </p>
        <p>
            {{$work->work4}}
        </p>
        <p>
            {{$work->work5}}
        </p>
    </div>
</div>
<!-- Works End -->
@endsection
