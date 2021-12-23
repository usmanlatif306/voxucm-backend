<?php

namespace App\Http\Controllers\Prison;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Did;
use App\Models\Order;
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
    public function cities()
    {
        $cities = City::paginate(8);
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
        $purchase = Order::create([
            'user_id' => auth()->user()->id,
            "state" => 'United Kingdom',
            'city' => $did->city->name,
            'dialing_code' => $did->dialing_code,
            'price' => $did->price,
        ]);

        $did->update(['status' => true]);

        return redirect()->route('prison.did.index');
    }

    // delete a did
    public function delete(Purchase $purchase)
    {

        $did = Did::where('dialing_code', $purchase->dialing_code)->first();
        $did->update(['status' => false]);
        $purchase->delete();
        return back()->with('success', 'Did deleted successfully');
    }
}
