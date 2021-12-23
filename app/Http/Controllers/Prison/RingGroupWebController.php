<?php

namespace App\Http\Controllers\Prison;

use App\Http\Controllers\Controller;
use App\Models\Voxucm;
use Illuminate\Http\Request;

class RingGroupWebController extends Controller
{
    public function index()
    {
        $ringgroups = $this->ringgroup();
        // dd($ringgroups);
        return view('prison.config.ringgroup.index', compact('ringgroups'));
    }

    public function addRingGroup(Request $request)
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'RINGGROUP',
            'ACTION' => 'ADD',
            'DATA' => array(
                "RINGGROUPNAME" => "HAMMAD",
                "RINGGROUPDESCRIPTION" => "5689793",
                "RINGDURATION" => "10",
                "CLIPREFIX" => "1245",
                "RECORDING" => "0",
                "FAILOVERAPP" => "HANGUP",
                "FAILOVERAPPNOID" => "2"
            )
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }

    private function ringgroup()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'RINGGROUP',
            'ACTION' => 'LIST',
        ));
        $data = Voxucm::curlRequest($postdata);
        $data = json_decode($data, true);
        return $data['DATA']['RESULTLIST'];
    }
}
