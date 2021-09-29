@extends('layouts.master')@section('title', 'Dashboard') @section('content')
@include('prison.dashboard.bread')
<div class="container pt-40 pb-40">
    <div class="row">
        <div class="col-12 col-md-3">@include('prison.dashboard.nav')</div>
        <div class="col-12 col-md-9">
            <div class="border rounded ml-4 w-75">
                <div class="card__header p-3">Account Details</div>
                <div class="px-3">
                    <h6 class="py-2 semi-bold">
                        Name: {{auth()->user()->name}}
                    </h6>
                    <h6 class="py-2 semi-bold">
                        Address: {{auth()->user()->address}}
                    </h6>
                    <h6 class="py-2 semi-bold">
                        Phone: {{auth()->user()->phone}}
                    </h6>
                    <h6 class="py-2 semi-bold">
                        Country: {{auth()->user()->country}}
                    </h6>
                    <h6 class="py-2 semi-bold">
                        City: {{auth()->user()->city}}
                    </h6>
                    <h6 class="py-2 semi-bold">
                        Postcode: {{auth()->user()->postcode}}
                    </h6>
                    <h6 class="py-2 semi-bold">
                        Email: {{auth()->user()->email}}
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
