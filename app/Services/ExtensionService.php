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
    public function getExtensions($id = null)
    {
        $postdata = array(
            'SECTION' => 'EXTENSION',
            'ACTION' => 'GETEXTENSIONS',
            'DATA' => array("USERNAME" => $id)
        );

        $data = Voxucm::curlRequest($postdata);
        $data = json_decode($data, true);
        // dd($data);
        if ($data["STATUS"] === "SUCCESS") {
            return $data['DATA']['RESULTLIST'];
        }
        return [];
    }

    // Adding extensions
    public function addExtension($data)
    {
        $postdata = array(
            'SECTION' => 'EXTENSION',
            'ACTION' => 'ADD',
            'DATA' => array(
                "FULLNAME" => $data['name'],
                "EXTENSION" => $data['extension'],
                "PASSWORD" => $data['password'],
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

    // extensions for admin user
    // Getting extensions
    public function getExtensionsAdmin($id, $data)
    {
        $postdata = array(
            'SECTION' => 'EXTENSION',
            'ACTION' => 'GETEXTENSIONS',
            'DATA' => array("USERNAME" => $id)
        );

        $data = Voxucm::curlRequestAdmin($postdata, $data);
        $data = json_decode($data, true);
        // dd($data);
        if ($data["STATUS"] === "SUCCESS") {
            return $data['DATA']['RESULTLIST'];
        }
        return [];
    }
}
