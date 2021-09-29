@extends('layouts.master')@section('title', 'Cart') @section('content')
<!-- breadcrumbs start -->
<section class="breadcrumbs-area pt-200 pb-140 bg-1 bg-blue fix">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="breadcrumbs">
                    <h2 class="page-title">Cart</h2>
                    <ul>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                        <li>cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumbs end -->
<!-- Cart Start -->
<div id="about" class="feature-area bg-light pt-40 pb-60 fix">
    <div class="container">
        @if(count($orders) < 1)
        <div class="section-title text-center">
            <h2>Empty Cart</h2>
        </div>
        @else
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session("success") }}
                </div>
                @endif
                <div class="border p-3 pb-5">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Item Name/Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <th>{{$loop->index+1}}</th>
                                <td>
                                    <span
                                        class="d-block font-weight-bold"
                                        >{{$order->product->name}}</span
                                    >
                                    <span class="d-block"
                                        >Total Number Of lines:
                                        {{$order->product->lines}}</span
                                    >
                                    <span class="d-block"
                                        >Total Number Of minutes:
                                        {{$order->product->minutes}}</span
                                    >
                                </td>
                                <td>£{{$order->product->price}}</td>
                                <td>£{{$order->product->price}}</td>
                                <!-- @if($order->order_status===0)
                            <td>Received</td>
                            @elseif($order->order_status===1)
                            <td>Processing</td>
                            @else
                            <td>Completed</td>
                            @endif -->
                                <td>
                                    <span
                                        class="fas fa-times text-danger pointer"
                                        onclick="event.preventDefault(); document.getElementById('order-{{$order->id}}').submit();"
                                    ></span>
                                    <form
                                        style="display: none"
                                        id="{{'order-'.$order->id}}"
                                        action="{{ route('order.delete',$order->id)}}"
                                        method="post"
                                    >
                                        @csrf @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div
                        class="
                            border-top border-bottom
                            d-flex
                            align-items-center
                            flex-row-reverse
                        "
                    >
                        <p class="m-0 py-2">
                            Sub Total:
                            <span class="font-weight-bold">£{{ $price }}</span>
                        </p>
                    </div>
                </div>
            </div>
            <form action="{{ route('prison.cartsave') }}" method="post">
                <div class="col-12 col-md-8 offset-md-2 position-relative">
                    <h3 class="py-4">1. Payment Method</h3>
                    <div
                        class="
                            form-check
                            d-flex
                            align-items-center
                            border-top border-bottom
                            py-2
                        "
                    >
                        <input
                            type="radio"
                            id="paypal"
                            name="pay_method"
                            value="paypal"
                            class="radio-width-cart"
                            checked
                        />
                         
                        <label
                            for="paypal"
                            class="radio-label-cart font-weight-bold"
                            >Pay by PayPal</label
                        >
                        <img
                            src="{{ asset('prison/img/paypal-logo.png') }}"
                            alt=""
                            class="pay-img-cart"
                        />
                    </div>
                    <div
                        class="
                            form-check
                            d-flex
                            align-items-center
                            border-bottom
                            py-2
                        "
                    >
                        <input
                            type="radio"
                            id="card"
                            name="pay_method"
                            value="card"
                            class="radio-width-cart"
                        />
                         
                        <label
                            for="card"
                            class="radio-label-cart font-weight-bold"
                            >Pay by Credit/ Debit Cards</label
                        >
                        <img
                            src="{{ asset('prison/img/creditcard.png') }}"
                            alt=""
                            class="pay-img-cart"
                        />
                    </div>
                </div>
                <!-- Billing Details -->
                <div class="col-12 col-md-8 offset-md-2">
                    <h3 class="py-4">2. Billing Details</h3>
                    <div class="px-3 row">
                        <input
                            type="hidden"
                            name="order_id"
                            value="{{$orders[0]->id}}"
                        />
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="fname"
                                    class="form-control"
                                    placeholder="First Name"
                                    required
                                />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="sname"
                                    class="form-control"
                                    placeholder="Sur Name"
                                    required
                                />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input
                                    type="number"
                                    name="number"
                                    class="form-control"
                                    placeholder="Contact Number"
                                    required
                                />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="address"
                                    class="form-control"
                                    placeholder="House No/Name and Streat No/Name "
                                />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="city"
                                    class="form-control"
                                    placeholder="City"
                                />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="country"
                                    class="form-control"
                                    placeholder="Country"
                                />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="postcode"
                                    class="form-control"
                                    placeholder="Postcode"
                                    required
                                />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <select
                                    name="area_prefix"
                                    class="form-control"
                                    required
                                >
                                    <option value="london">
                                        Select Area Prefix
                                    </option>
                                    <option value="london">London</option>
                                    <option value="manchestor">
                                        Manchestor
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{auth()->user()->email}}"
                                    readonly
                                />
                            </div>
                        </div>
                        <!-- For credit card -->
                        <div id="creditCardMethod" class="row py-2 px-3 d-none">
                            <div class="col-12">
                                <div class="form-group">
                                    <label
                                        for="cardNumber"
                                        class="font-weight-bold"
                                        >Credit Card Number *</label
                                    >
                                    <input
                                        type="number"
                                        name="card_number"
                                        class="form-control"
                                        id="cardNumber"
                                        placeholder="Credit Card Number"
                                    />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="mmNumber"
                                        class="font-weight-bold"
                                        >Expiration * (MM)</label
                                    >
                                    <input
                                        type="number"
                                        name="mm_expiry"
                                        class="form-control"
                                        id="mmNumber"
                                        placeholder="MM"
                                    />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="cardYear"
                                        class="font-weight-bold"
                                        >Expiration *(YYYY)</label
                                    >
                                    <input
                                        type="number"
                                        name="year_expiry"
                                        class="form-control"
                                        id="cardYear"
                                        placeholder="Year"
                                    />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="cardCVC"
                                        class="font-weight-bold"
                                        >Card CVC *</label
                                    >
                                    <input
                                        type="number"
                                        name="card_cvc"
                                        class="form-control"
                                        id="cardCVC"
                                        placeholder="CVC"
                                    />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label
                                        for="cardHolderName"
                                        class="font-weight-bold"
                                        >Card Holder Name *</label
                                    >
                                    <input
                                        type="text"
                                        name="card_holder_name"
                                        class="form-control"
                                        id="cardHolderName"
                                        placeholder="Card Holder Name"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- presinor details -->
                <div class="col-12 col-md-8 offset-md-2">
                    <h3 class="py-4">3. Prisoner Details</h3>
                    <div class="px-3 row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="prison_fname"
                                    class="form-control"
                                    placeholder="Prisoner First Name"
                                    required
                                />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="prison_lname"
                                    class="form-control"
                                    placeholder="Prisoner Last Name"
                                    required
                                />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input
                                    type="number"
                                    name="prison_number"
                                    class="form-control"
                                    placeholder="Prisoner Number"
                                    required
                                />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <select
                                    name="prison_status"
                                    class="form-control"
                                    id="prison-status"
                                >
                                    <option value="">
                                        Select Prison Status
                                    </option>
                                    <option value="sentenced">Sentenced</option>
                                    <option value="remanded">Remanded</option>
                                </select>
                            </div>
                        </div>
                        <div id="release" class="col-12 col-md-6 d-none">
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="release_date"
                                    class="form-control"
                                    placeholder="Release Date"
                                />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="prison"
                                    class="form-control"
                                    placeholder="Prison"
                                    required
                                />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="prison_relation"
                                    class="form-control"
                                    placeholder="Relation With Prison"
                                    required
                                />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="prison_contact"
                                    class="form-control"
                                    placeholder="Prison Contact"
                                    required
                                />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="prison_contact_name"
                                    class="form-control"
                                    placeholder="Contact Name"
                                    required
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- term and condions -->
                <div class="col-12 col-md-8 offset-md-2">
                    <h4 class="pt-4 pb-3">term and condions</h4>
                    <div class="position-relative">
                        <input
                            id="term-select"
                            type="checkbox"
                            class="cart-checkbox"
                            required
                        />
                        <label
                            for="term-select"
                            class="cart-checkbox-level pl-2 font-weight-bold"
                            >I agree</label
                        >
                    </div>
                    <span
                        >Please only click this box if you have read, understood
                        and agree to the
                        <a href="{{ route('prison.terms') }}"
                            >terms and conditions</a
                        >
                        of the prison tel service.</span
                    >
                    <span class="d-block font-weight-bold pt-3 pb-1"
                        >Connection fee</span
                    >
                    <span
                        >One off connection fee is included in the total
                        price.</span
                    >
                </div>
                <!-- proceed -->
                <div class="col-12 col-md-8 offset-md-2">
                    <button
                        type="submit"
                        class="btn btn-primary shadow-none float-right mt-5"
                    >
                        Proceed
                    </button>
                </div>
            </form>
        </div>
        @endif
    </div>
</div>
<!-- Cart End -->

@push('scripts')
<script>
    $(document).ready(function () {
        $("input[name='pay_method']").change(function () {
            var value = $("input[name='pay_method']:checked").val();
            if (value === "card") {
                $("#creditCardMethod").removeClass("d-none");
            } else {
                $("#creditCardMethod").addClass("d-none");
            }
        });
        $("select[name='prison_status']").change(function () {
            var status = $("select[name='prison_status']").val();
            if (status === "sentenced") {
                $("#release").removeClass("d-none");
            } else {
                $("#release").addClass("d-none");
            }
        });
    });
</script>
@endpush @endsection
