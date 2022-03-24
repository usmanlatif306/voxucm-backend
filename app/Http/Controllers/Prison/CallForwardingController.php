<?php

namespace App\Http\Controllers\Prison;

use App\Http\Controllers\Controller;
use App\Models\CallForwarding;
use App\Models\Voxucm;
use Illuminate\Http\Request;

class CallForwardingController extends Controller
{
    public function index()
    {
        return view('prison.callforwrding.index');
    }

    // setting callforwarding
    public function setForwarding(Request $request)
    {
        $postdata  = array(
            'SIPUSER' => $request->destination,
            'SECTION' => 'FORWARDING',
            'ACTION' => 'NORMAL',
            'DATA' => array('FW_ENABLE' => '1', 'ALLWAYS' => $request->number)
        );

        $data = Voxucm::curlRequest($postdata);
        $data = json_decode($data, true);

        if ($data["STATUS"] === "SUCCESS") {
            CallForwarding::updateOrCreate([
                'subscriber_id' => $request->subscriber_id,
                'call_type' => 'ALLFORWARD',
                'destination_number' => $request->number,
            ], [
                'status' => true
            ]);
            // CallForwarding::create([
            //     'subscriber_id' => $request->subscriber_id,
            //     'call_type' => 'ALLFORWARD',
            //     'destination_number' => $request->number,
            // ]);
            return redirect()->back()->with('success', 'Call Forwarding successfully enabled');
        } else {
            return redirect()->back()->with('error', $data['DATA']['MESSAGE']);
        }
    }

    // disabling callforwarding
    public function disableForwarding(Request $request)
    {
        $postdata =  array(
            'SIPUSER' => $request->destination,
            'SECTION' => 'FORWARDING',
            'ACTION' => 'NORMAL',
            'DATA' => array('FW_ENABLE' => '0', 'ALLWAYS' => $request->number)
        );

        $data = Voxucm::curlRequest($postdata);
        $data = json_decode($data, true);
        if ($data["STATUS"] === "SUCCESS") {
            CallForwarding::where('subscriber_id', $request->subscriber_id)->update(['status' => false]);
            return redirect()->back()->with('success', 'Call Forwarding disabled successfully');
        } else {
            return redirect()->back()->with('error', $data['DATA']['MESSAGE']);
        }
    }
}
