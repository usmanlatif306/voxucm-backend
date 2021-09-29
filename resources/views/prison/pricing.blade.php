@extends('layouts.master')@section('title', 'Pricing') @section('content')
<!-- breadcrumbs start -->
<section class="breadcrumbs-area pt-200 pb-140 bg-1 bg-blue fix">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title">Pricing</h2>
                    <ul>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                        <li>Pricing</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumbs end -->
<!-- Pricing Area Start -->
<div id="voiprate" class="pricing-area ptb-100">
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session("success") }}
        </div>
        @endif @if (session('error'))
        <div class="alert alert-success" role="alert">
            {{ session("error") }}
        </div>
        @endif
        <div class="row">
            @foreach ($products as $product)
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
            <!-- <div class="col-lg-3 col-md-6 mb-4">
                <form method="POST" action="{{ route('order.save') }}">
                    @csrf
                    <input
                        type="hidden"
                        name="user_id"
                        @auth
                        value="{{auth()->user()->id}}"
                        @endauth
                    />
                    <input type="hidden" name="product_id" value="1" />
                    <div class="single-table">
                        <div class="table-title">
                            <h4>Basic One</h4>
                            <h1>£9.9/<span>mo</span></h1>
                            <h5>Starting</h5>
                        </div>
                        <div class="table-content">
                            <span>Number of Lines 1</span>
                            <span>Number of minutes allowed 100</span>
                            <span>Plan used for 1 Month</span>
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
            </div> -->
            <!-- <div class="col-lg-3 col-md-6 mb-4">
                <form method="POST" action="{{ route('order.save') }}">
                    @csrf
                    <input
                        type="hidden"
                        name="user_id"
                        @auth
                        value="{{auth()->user()->id}}"
                        @endauth
                    />
                    <input type="hidden" name="product_id" value="2" />
                    <div class="single-table best-pack">
                        <div class="table-title">
                            <h4>Prison 200</h4>
                            <h1>£16.23/<span>mo</span></h1>
                            <h5>Starting</h5>
                        </div>
                        <div class="table-content">
                            <span>Number of Lines 1</span>
                            <span>Number of minutes allowed 200</span>
                            <span>Plan used for 1 Month</span>
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
                    <input type="hidden" name="product_id" value="3" />
                    <div class="single-table mt-sm-30">
                        <div class="table-title">
                            <h4>Prison 500</h4>
                            <h1>£31.98/<span>mo</span></h1>
                            <h5>Starting</h5>
                        </div>
                        <div class="table-content">
                            <span>Number of Lines 1</span>
                            <span>Number of minutes allowed 500</span>
                            <span>Plan used for 1 Month</span>
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
                    <input type="hidden" name="product_id" value="4" />
                    <div class="single-table mt-sm-30">
                        <div class="table-title">
                            <h4>Standard One</h4>
                            <h1>£34.98/<span>mo</span></h1>
                            <h5>Starting</h5>
                        </div>
                        <div class="table-content">
                            <span>Number of Lines 3</span>
                            <span>Number of minutes allowed 400</span>
                            <span>Plan used for 1 Month</span>
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
                    <input type="hidden" name="product_id" value="5" />
                    <div class="single-table mt-sm-30">
                        <div class="table-title">
                            <h4>Premier One</h4>
                            <h1>£59.99/<span>mo</span></h1>
                            <h5>Starting</h5>
                        </div>
                        <div class="table-content">
                            <span>Number of Lines 5</span>
                            <span>Number of minutes allowed 800</span>
                            <span>Plan used for 1 Month</span>
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
                    <input type="hidden" name="product_id" value="6" />
                    <div class="single-table mt-sm-30">
                        <div class="table-title">
                            <h4>Premier Ex</h4>
                            <h1>£99.99/<span>mo</span></h1>
                            <h5>Starting</h5>
                        </div>
                        <div class="table-content">
                            <span>Number of Lines 5</span>
                            <span>Number of minutes allowed 2000</span>
                            <span>Plan used for 1 Month</span>
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
            </div> -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="single-table mt-sm-30">
                    <div class="table-title">
                        <h4>Custom package</h4>
                        <h4 class="pt-2 text-center">Customise Your Peckage</h4>
                    </div>
                    <div class="table-content px-2">
                        <div class="form-group">
                            <input
                                type="number"
                                class="form-control shadow-none"
                                placeholder="Enter Number of Lines"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                type="number"
                                class="form-control shadow-none"
                                placeholder="Number of minutes allowed"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                type="number"
                                class="form-control shadow-none"
                                placeholder="Plan used for Months"
                            />
                        </div>
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
            </div>
        </div>
    </div>
</div>
<!-- Pricing Area End -->
@endsection
