<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::get();
        return response()->json([
            "countries" => $countries,
        ], 200);
    }

    public function show(Country $country)
    {
        $cities = $country->cities;
        return response()->json([
            "country" => $country,
            "cities" => $cities
        ], 200);
    }

    public function dids(Country $country, City $city)
    {
        $dids = $city->dids;
        return response()->json([
            "country" => $country,
            "city" => $city,
            "dids" => $dids
        ], 200);
    }
}
