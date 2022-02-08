<?php

namespace App\Http\Controllers;

use App\Models\Voxucm;
use App\Services\ExtensionService;
use Illuminate\Http\Request;

class ExtController extends Controller
{
    public function callrecords()
    {
        $url = 'http://141.94.55.55/voxucm/api/livecall';
        $data = array('tenant_id' => 'All', 'tenant_username' => 'cheapbox');

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }

    // accounts
    public function accounts()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'EXTENSION',
            'ACTION' => 'GETEXTENSIONS',
            'DATA' => array("USERNAME" => "21_991010")
        ));

        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Add Extension
    public function addextension(Request $request)
    {
        $data = (new ExtensionService())->addExtension($request);
        return $data;
    }
    // Update Extension
    public function updateExt()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'EXTENSION',
            'ACTION' => 'EDIT',
            'DATA' => array(
                "EXTENSIONID" => "65",
                "FULLNAME" => "x1yzy",
                "EXTENSION" => "5689913",
                "CALLERIDEXTERNAL" => "25455",
                "MAXCALLS" => "1",
                "TAPIACCOUNT" => "0",
                "DENY" => "0.0.0.0/0.0.0.0",
                "PERMIT" => "0.0.0.0/0.0.0.0",
                "NAT" => "no",
                "DTMFMODE" => "rfc2833",
                "MEDIAREINVITE" => "yes",
                "INSECURE" => "no",
                "ALLOWEDCODECS" => array("ulaw", "alaw"),
                "REPLACECLINAME" => "no",
                "DISABLEEXTPANELCONFIGURATION" => "disable",
                "ALLOWREMOTERINGING" => "no",
                "RINGDURATION" => "10",
                "FAILURE" => "HANGUP",
                "FAILUREAPPNOID" => "",
                "STATUS" => "1",
                "COUNTRYID" => "3",
                "DEPARTMENTID" => "",
                "MUSICONHOLDID" => "",
                "VOICEMAIL" => "0",
                "VOICEMAILID" => "",
                "EXTBALANCEOPTION" => "0",
                "PICKUPGROUP" => "",
                "HOLIDAYFALG" => "0",
                "HOLIDAYID" => "",
                "PHONENUMBER" => "",
                "EMAILID" => "",
                "ADDRESS" => "",
                "VEDIOSUPPORT" => "1",
                "FOLLOWME" => "FORWARDING"
            )
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Allow codec
    public function allowcodec()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'ALLOWEDCODECSDROPDOWN',
            'ACTION' => 'LIST'
        ));

        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Country list
    public function countrylist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'COUNTRYDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Department list
    public function departmentlist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'DEPARTMENTDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Did list
    public function dids()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'EXTENSION',
            'SECTION' => 'INSECUREDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // DTMP list
    public function dtmplist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'DTMFMODEDROPDOWN',
            'ACTION' => 'LIST',
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Extension dropdown list
    public function extensiondropdownlist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'EXTENSIONDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Extension list
    public function extensionlist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'EXTENSION',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Extension limit
    public function extensionlimit()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'EXTENSION',
            'ACTION' => 'GETEXTENSIONLIMIT',
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Follow me
    public function followme()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'FOLLOWMEDROPDOWN',
            'ACTION' => 'LIST',
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Holidaylist
    public function holidaylist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'HOLIDAYDROPDOWN',
            'ACTION' => 'LIST',
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Media reinvite
    public function mediareinvite()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'MEDIAREINVITEDROPDOWN',
            'ACTION' => 'LIST',
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Music Lust
    public function musiclist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'MOHDROPDOWN',
            'ACTION' => 'LIST',
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Nat Lust
    public function natlist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'NATDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Pickup list
    public function pickup()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'PICKUPGROUPDROPDOWN',
            'ACTION' => 'LIST',
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Ring Duraion
    public function ringduraion()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'RINGDURATIONDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Ring Duraion
    public function getextensions()
    {
        $extensions = (new ExtensionService())->getExtensions();
        return $extensions;
    }

    // Add Extension Web
    public function addExtensionWeb(Request $request)
    {
        $data = (new ExtensionService())->addExtension($request);
        $data = json_decode($data, true);

        $error = $data['DATA']['MESSAGE'];
        if ($data['STATUS'] === 'FAILED') {
            return redirect()->back()->with('error', $error);
        }
        return redirect()->back()->with('success', "Extension added successfully");
    }
}
