<?php

namespace App\Services;

use App\Models\Voxucm;

/**
 * Class ExtensionService
 * @package App\Services
 */
class ExtensionService
{
    // Getting extensions
    public function getExtensions()
    {
        // $data = json_encode(array(
        //     'APIUSER' => '74_usman',
        //     'APIPASSWORD' => MD5('12345678'),
        //     'SECTION' => 'AUTHAPIUSER',
        //     'ACTION' => 'AUTHAPIUSER'
        // ));
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, 'http://141.94.55.55/voxucm/api/api.php');
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, 'request=' . $data);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $server_output = curl_exec($ch);
        // curl_close($ch);
        // dd(json_decode($server_output, true));

        // $postdata = json_encode(array(
        //     'APIUSER' => '21_apiuser',
        //     'APIPASSWORD' => MD5('123456'),
        //     'SECTION' => 'EXTENSION',
        //     'ACTION' => 'GETEXTENSIONS',
        //     'DATA' => array("USERNAME" => "21_991010")
        // ));

        $postdata = array(
            'SECTION' => 'EXTENSION',
            'ACTION' => 'GETEXTENSIONS',
            'DATA' => array("USERNAME" => auth()->user()->vox_user->extension)
        );

        $data = Voxucm::curlRequest($postdata);
        $data = json_decode($data, true);
        // dd($data);
        if (auth()->user()->vox_user->extension) {
            return $data['DATA']['RESULTLIST'];
        }
        return [];
    }

    // Adding extensions
    public function addExtension($request)
    {
        $postdata = array(
            'SECTION' => 'EXTENSION',
            'ACTION' => 'ADD',
            'DATA' => array(
                "FULLNAME" => $request->name,
                "EXTENSION" => $request->extension,
                "PASSWORD" => $request->password,
                "CALLERIDEXTERNAL" => "",
                "MAXCALLS" => "1",
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
                "CREDIT" => "0",
                "PICKUPGROUP" => "",
                "HOLIDAYFALG" => "0",
                "HOLIDAYID" => "",
                "PHONENUMBER" => "",
                "EMAILID" => "",
                "ADDRESS" => "",
                "FOLLOWME" => "NO",
                "VEDIOSUPPORT" => "1",
                "TAPIACCOUNT" => "1"
            )
        );

        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
}
