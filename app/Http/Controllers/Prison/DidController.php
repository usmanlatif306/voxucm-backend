<?php

namespace App\Http\Controllers\Prison;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Did;
use App\Models\Purchase;
use Illuminate\Http\Request;

class DidController extends Controller
{
    public function index()
    {
        $numbers = auth()->user()->numbers()->get();
        return view('prison.dashboard.did.index', compact('numbers'));
    }
    // purchase
    public function countries()
    {
        $countries = Country::all();
        return view('prison.dashboard.did.create', compact('countries'));
    }

    // cities
    public function cities(Country $country)
    {
        $cities = $country->cities()->with('country')->get();
        return view('prison.dashboard.did.cities', compact('cities'));
    }

    // dids
    public function dids(City $city)
    {
        $dids = $city->dids()->with('city')->where('status', false)->get();
        return view('prison.dashboard.did.dids', compact('dids'));
    }

    // purchase Did
    public function purchase(Did $did)
    {
        $purchase = Purchase::create([
            'user_id' => auth()->user()->id,
            'country' => $did->city->country->name,
            'city' => $did->city->name,
            'prefix' => 123456,
            'setup_fee' => 30,
            'monthly_fee' => 5,
            'did' => $did->did,
        ]);

        $did->update(['status' => true]);

        return redirect()->route('prison.did.index');
    }

    // delete a did
    public function delete(Purchase $purchase)
    {

        $did = Did::where('did', $purchase->did)->first();
        $did->update(['status' => false]);
        $purchase->delete();
        return back()->with('success', 'Did deleted successfully');
    }
}
