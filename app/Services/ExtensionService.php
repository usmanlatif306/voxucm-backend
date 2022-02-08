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
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'EXTENSION',
            'ACTION' => 'GETEXTENSIONS',
            'DATA' => array("USERNAME" => "21_991010")
        ));

        $data = Voxucm::curlRequest($postdata);
        $data = json_decode($data, true);

        return $data['DATA']['RESULTLIST'];
    }

    // Adding extensions
    public function addExtension($request)
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'EXTENSION',
            'ACTION' => 'ADD',
            'DATA' => array(
                "FULLNAME" => "xyzy",
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
        ));

        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
}
