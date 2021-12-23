@extends('layouts.account')@section('title', 'Dashboard') @section('content')

<div class="container pb-40">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Add Extra Minutes</h3>
                </div>
                <div class="card-body">
                    <div class="border my-2 mx-4">
                        <div class="form-group py-2 px-3">
                            <select class="form-control shadow-none">
                                <option value="">Select numbers of minutes</option>
                                <option>100</option>
                                <option>200</option>
                                <option>300</option>
                                <option>400</option>
                                <option>500</option>
                                <option>600</option>
                                <option>700</option>
                                <option>800</option>
                                <option>900</option>
                                <option>1000</option>
                            </select>
                        </div>
                        <hr />
                        <div class="form-group py-2 px-3">
                            <select class="form-control shadow-none">
                                <option value="">Plan used for</option>
                                <option>1 Month</option>
                                <option>3 Months</option>
                                <option>6 Months</option>
                                <option>12 Months</option>
                                <option>24 Months</option>
                            </select>
                        </div>
                        <hr />
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
                                     
                                    <label for="creditcard" class="radio-label font-weight-bold">Pay by Credit/ Debit
                                        Cards
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <img src="{{ asset('prison/img/creditcard.png') }}" alt="" class="pay-img-credit" />
                            </div>
                        </div>
                        <hr class="hr-width" />
                    </div>
                    <form id="creditCardMethod" class="d-none">
                        <div class="row py-2 px-5">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="cardNumber" class="font-weight-bold">Credit Card Number *</label>
                                    <input type="number" name="fname" class="form-control" id="cardNumber"
                                        placeholder="Credit Card Number" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="mmNumber" class="font-weight-bold">Expiration * (MM)</label>
                                    <input type="number" name="" class="form-control" id="mmNumber" placeholder="MM" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="cardYear" class="font-weight-bold">Expiration *(YYYY)</label>
                                    <input type="number" name="" class="form-control" id="cardYear"
                                        placeholder="Year" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="cardCVC" class="font-weight-bold">Card CVC *</label>
                                    <input type="number" name="fname" class="form-control" id="cardCVC"
                                        placeholder="CVC" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="cardHolderName" class="font-weight-bold">Card Holder Name *</label>
                                    <input type="text" name="name" class="form-control" id="cardHolderName"
                                        placeholder="Card Holder Name" />
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="px-5 pt-40 pb-40">
                        <button type="submit" class="btn btn-primary w-100">
                            Buy Minutes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $("input[name='paymethod']").change(function () {
            var value = $("input[name='paymethod']:checked").val();
            if (value === "creditcard") {
                $("#creditCardMethod").removeClass("d-none");
            } else {
                $("#creditCardMethod").addClass("d-none");
            }
        });
    });
</script>
@endpush @endsection