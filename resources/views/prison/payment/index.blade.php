@extends('layouts.master')@section('title', 'Payment') @section('content')
@include('prison.dashboard.bread')
<div class="container pt-40 pb-40">
    <div class="row">
        <div class="col-12 col-md-3">@include('prison.dashboard.nav')</div>
        <div class="col-12 col-md-9">
            <div class="border rounded ml-md-4 mt-3 mt-md-0 dash__width">
                <div class="card__header p-3">Payment</div>
                <div class="border my-2 mx-4">
                    <div class="row">
                        <div class="col-12 col-md-6 position-relative">
                            <div class="form-check">
                                <input type="radio" id="paypal" name="paymethod" value="paypal" class="radio-width"
                                    checked />
                                 
                                <label for="paypal" class="radio-label font-weight-bold">Pay by PayPal</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <img src="{{ asset('prison/img/paypal-logo.png') }}" alt="" class="pay-img" />
                        </div>
                    </div>
                    <hr class="hr-width" />
                    <div class="row mt-3">
                        <div class="col-12 col-md-6 position-relative">
                            <div class="form-check">
                                <input type="radio" id="creditcard" name="paymethod" value="creditcard"
                                    class="radio-width" />
                                 
                                <label for="creditcard" class="radio-label font-weight-bold">Pay by Credit/ Debit Cards
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <img src="{{ asset('prison/img/creditcard.png') }}" alt="" class="pay-img-credit" />
                        </div>
                    </div>
                    <hr class="hr-width" />
                </div>
                <form id="creditCardMethod" class="d-none validation"
                    action="{{ route('prison.payment.stripe',$purchase) }}" method="POST" data-cc-on-file="false"
                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
                    @csrf
                    <div class="row py-2 px-5">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="cardNumber" class="font-weight-bold">Credit Card Number *</label>
                                <input type="number" name="cardNumber" class="form-control" id="cardNumber"
                                    placeholder="Credit Card Number" required />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="cardMonth" class="font-weight-bold">Expiration * (MM)</label>
                                <input type="number" name="" class="form-control" id="cardMonth" placeholder="MM"
                                    required />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="cardYear" class="font-weight-bold">Expiration *(YYYY)</label>
                                <input type="number" name="" class="form-control" id="cardYear" placeholder="Year"
                                    required />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="cardCVC" class="font-weight-bold">Card CVC *</label>
                                <input type="number" name="fname" class="form-control" id="cardCVC" placeholder="CVC"
                                    required />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="cardHolderName" class="font-weight-bold">Card Holder Name *</label>
                                <input type="text" name="name" class="form-control" id="cardHolderName"
                                    placeholder="Card Holder Name" required />
                            </div>
                        </div>
                        <div class='col-md-12 error form-group d-none'>
                            <div class='alert-danger alert'>Please correct the errors and try
                                again.
                            </div>
                        </div>
                        <div class="px-3 pt-40 pb-40 w-100" id="stripeBtn">
                            <button type="submit" class="btn btn-primary w-100">
                                Pay
                            </button>
                        </div>
                    </div>

                </form>
                <div class="px-4 pt-40 pb-40" id="paypalBtn">
                    <button class="btn btn-primary w-100">
                        Pay
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    $(document).ready(function () {

        $("input[name='paymethod']").change(function () {
            var value = $("input[name='paymethod']:checked").val();
            if (value === "creditcard") {
                $("#creditCardMethod").removeClass("d-none");
                $('#paypalBtn').addClass('d-none')
            } else {
                $("#creditCardMethod").addClass("d-none");
                $('#paypalBtn').removeClass('d-none')
            }
        });

        // Stripe Payment
        var $form = $(".validation");
        $('form.validation').bind('submit', function (e) {
            $('.error').addClass('d-none');
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('#cardNumber').val(),
                    cvc: $('#cardCVC').val(),
                    exp_month: $('#cardMonth').val(),
                    exp_year: $('#cardYear').val()
                }, stripeHandleResponse);
            }

        });

        function stripeHandleResponse(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('d-none')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>
@endpush @endsection