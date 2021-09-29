<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\Did;

class DidController extends Controller
{
    // Get All Countries from DB
    public function index()
    {
        $countries = Country::get();
        return response()->json([
            "countries" => $countries,
        ], 200);
    }
    // Get All citis in a country from DB
    public function show(Country $country)
    {
        $cities = $country->cities;
        return response()->json([
            "country" => $country,
            "cities" => $cities
        ], 200);
    }
    // Get did in a city from DB
    public function dids(Country $country, City $city)
    {
        $dids = $city->dids;
        return response()->json([
            "country" => $country,
            "city" => $city,
            "dids" => $dids
        ], 200);
    }
    // Update Did
    public function updatedid(Did $did, Request $request)
    {
        $result = $did->update(['status' => 1]);
        if ($result) {
            return response()->json([
                "message" => "Data update successfully"
            ], 200);
        }
        return response()->json([
            "error" => "Something went wrong"
        ], 401);
    }

    public function allDids()
    {
        $dids = Did::get();
        return response()->json([
            "dids" => $dids
        ], 200);
    }
}
