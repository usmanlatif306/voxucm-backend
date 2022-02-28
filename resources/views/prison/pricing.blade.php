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
                <form method="POST" id="savePlan-{{$product->id}}" action="{{ route('order.save') }}">
                    @csrf
                    <input type="hidden" name="user_id" @auth value="{{auth()->user()->id}}" @endauth />
                    <input type="hidden" name="product_id" value="{{$product->id}}" />
                    <input type="hidden" name="price" value="{{$product->price}}" />
                    <div class="single-table">
                        <div class="table-title">
                            <h4>{{$product->name}}</h4>
                            <h1>£{{$product->price}}/<span>mo</span></h1>
                            <h5>Starting</h5>
                        </div>
                        <div class="table-content">
                            <span>Number of Lines {{$product->lines}}</span>
                            <span>Number of minutes allowed
                                {{$product->numbers}}</span>
                            <span>Plan used for {{$product->month}} Month</span>
                            <button data-id="{{$product->id}}" class="default-btn table-btn save-plan" type="submit">
                                Add Plan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            @endforeach
            <!-- custom peckage -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="single-table mt-sm-30">
                    <div class="table-title">
                        <h4>Custom package</h4>
                        <h4 class="pt-2 text-center">Customise Your Peckage</h4>
                    </div>
                    <div class="table-content px-2">
                        <div class="form-group">
                            <input type="number" class="form-control shadow-none" placeholder="Enter Number of Lines" />
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control shadow-none"
                                placeholder="Number of minutes allowed" />
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control shadow-none" placeholder="Plan used for Months" />
                        </div>
                        <button class="default-btn table-btn" type="submit">
                            Add Plan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pricing Area End -->


<!-- Order Success Modal -->
<div class="modal fade" id="planSavedModel" tabindex="-1" role="dialog" aria-labelledby="planSavedModelLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body text-center mt-5">
                <i class="far fa-check-circle text-success fa-5x"></i>
                <h3 class="mt-4">Added to your cart</h3>
            </div>
            <div class="modal-footer border-top-0 mt-3">
                <button type="button" class="btn btn-primary text-uppercase" data-dismiss="modal">Continue
                    Shopping</button>
                <a href="{{route('prison.cart')}}" class="btn btn-secondary text-uppercase">Checkout</a>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('.save-plan').on('click', function (e) {
        e.preventDefault();

        let id = $(this).data("id");
        $.ajax({
            url: "{{route('order.save')}}",
            type: "POST",
            data: $('#savePlan-' + id).serialize(),
            success: function (response) {
                // console.log(response);
                if (!response.error) {
                    let oldCart = $('.cart-amount').text();
                    $('.cart-amount').text(parseInt(oldCart) + 1)
                    $('#planSavedModel').modal('show')
                } else {
                    alert('Something Went Wrong');
                }
            },
            error: function (error) {
                alert('Something Went Wrong');
            }
        });
    });

</script>
@endpush