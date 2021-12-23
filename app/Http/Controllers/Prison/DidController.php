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
        return view('prison.config.did.index', compact('numbers'));
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
        return view('prison.config.did.cities', compact('cities'));
    }

    // dids
    public function dids(City $city)
    {
        $dids = $city->dids()->with('city')->where('status', false)->get();
        return view('prison.config.did.dids', compact('dids'));
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
    public function delete(Order $order)
    {
        $did = Did::where('dialing_code', $order->dialing_code)->first();
        $did->update(['status' => false]);
        $order->delete();
        return back()->with('success', 'Did deleted successfully');
    }
}
