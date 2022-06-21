<?php

namespace App\Http\Controllers;

use App\Models\AreaCode;
use App\Models\CallForwarding;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Promo;
use App\Models\Voxucm;
use App\Models\Voxucm\VoxTenant;
use App\Services\ExtensionService;
use Illuminate\Http\Request;
use Stripe;

class CartController extends Controller
{
    public function cart()
    {
        // if user is not logged in then redirect to login page
        if (!auth()->user()) {
            session(['redirect' => 'prison.cart']);
            return redirect()->route('prison.login');
        }
        // if user has not completed his profile then redirect to profile complete page
        if (!auth()->user()->user_details) {
            session(['redirect' => 'prison.cart']);
            return redirect()->route('user_profile');
        }

        // dd(Order::whereIn('id', session('user.cart'))->where('order_status', 'Unpaid')->get());
        $orders = auth()->user()->orders()->where('order_status', 'Unpaid')->get();
        $codes = AreaCode::orderBy('city')->get();

        return view('prison.cart', [
            'orders' => $orders,
            'price' => $orders->sum('price'),
            'codes' => $codes
        ]);
    }

    // Save records
    public function saveRecords(Request $request)
    {
        $orders = auth()->user()->orders()->where('order_status', 'Unpaid')->get();
        $plan = auth()->user()->orders()->whereNotNull('product_id')->where('order_status', 'Unpaid')->first();

        // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        // $payment = Stripe\Charge::create([
        //     "amount" => 100 * $request->price,
        //     "currency" => "eur",
        //     "source" => $request->stripeToken,
        //     "description" => "Making test payment."
        // ]);

        // making order status as Paid in DB
        foreach ($orders as $order) {
            $order->update(['order_status' => 'Paid', 'payment_id' => 456, 'invoiced' => now()]);
            $order->billdetail()->create($request->all());
            $order->prisonerdetail()->create($request->all());
        }
        // updating user plan
        if ($plan) {
            $lines = $plan->product->lines;
            auth()->user()->plan()->create([
                'product_id' => $plan->product->id,
                // 'expired_at' => now()->addMonth($plan->product->month),
                'expired_at' => now()->addDays($plan->product->month * 30)->toDateTimeString(),
                'month' => $plan->product->month,
                'minutes' => $plan->product->minutes,
                'allowed_dids' => $lines,
            ]);

            $voxUser = VoxTenant::where('tenant_id', auth()->user()->vox_user->tenant_id);


            // updating max extension limit and balance of voxucm user
            $previousExt = $voxUser->first()->max_extension;
            $newExtLimit = $previousExt + $lines;

            $prevousBalnace = $voxUser->first()->credit;
            $newBalance = $prevousBalnace + $request->price;
            $voxUser->update(['max_extension' => $newExtLimit, 'credit' => $newBalance]);

            // checking how many extension user already have
            $extensions = count((new ExtensionService())->getExtensions());
            // creating number of extension equals to lines purchased in voxucm
            for ($i = 0 + $extensions; $i < $lines + $extensions; $i++) {
                $prefix = $i + 1;
                $values = [
                    'name' => auth()->user()->name . ' ' . $prefix,
                    'extension' => auth()->user()->name . ' ' . $prefix,
                    'password' => auth()->user()->vox_user->api_password,
                ];
                $data = (new ExtensionService())->addExtension($values);
                $data = json_decode($data, true);
                if ($data["STATUS"] === "SUCCESS") {
                    $username = $data['DATA']["USERNAME"];
                    $id = $data['DATA']["EXTENSIONID"];
                    // adding call forwarding for created extension
                    $postdata  = array(
                        'SIPUSER' => $username,
                        'SECTION' => 'FORWARDING',
                        'ACTION' => 'NORMAL',
                        'DATA' => array('FW_ENABLE' => '1', 'ALLWAYS' => auth()->user()->phone)
                    );
                    $res = Voxucm::curlRequest($postdata);
                    $res = json_decode($res, true);
                    if ($res["STATUS"] === "SUCCESS") {
                        CallForwarding::create([
                            'subscriber_id' => $id,
                            'call_type' => 'ALLFORWARD',
                            'destination_number' => auth()->user()->phone,
                            'status' => true
                        ]);
                    }
                } else {
                    dd($data);
                }
            }
            // updating extension detail in db
            auth()->user()->vox_user()->update([
                'extension' => $username
            ]);
        }


        // BillDetail::create($request->all());
        // PrisonerDetail::create($request->all());

        return redirect()->route('prison.dashboard')->with('success', "Payment has been successfully done.");
    }

    // apply promo code to cart
    public function promo(Request $request)
    {
        $promo = Promo::where('name', $request->name)->first();
        if ($promo && $promo->status) {
            return response([
                'error' => false,
                'message' => 'valid promo code',
                'discount' => $promo->value,
            ]);
        } else {
            return response([
                'error' => true,
                'message' => 'invalid promo code',
            ]);
        }
    }
}
