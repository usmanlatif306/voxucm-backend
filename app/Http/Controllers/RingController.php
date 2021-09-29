<?php

namespace App\Http\Controllers;

use App\Models\Voxucm;
use Illuminate\Http\Request;

class RingController extends Controller
{
    // Ring group list
    public function ringgroup()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'RINGGROUP',
            'ACTION' => 'LIST',
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Ring Add extension
    public function ringaddext()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'RINGGROUP',
            'ACTION' => 'ADDEXTENSION',
            'DATA' => array(
                "RINGGROUPID" => "1",
                "EXTENSIONID" => "1"
            )
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Ring Delete extension
    public function ringdeltext()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'RINGGROUP',
            'ACTION' => 'DELETEEXTENSION',
            'DATA' => array(
                "RINGGROUPID" => "34",
                "EXTENSIONID" => "12"
            )
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Ring Add Group
    public function ringaddgroup()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'RINGGROUP',
            'ACTION' => 'ADD',
            'DATA' => array(
                "RINGGROUPNAME" => "",
                "RINGGROUPDESCRIPTION" => "5689793",
                "RINGDURATION" => "123456",
                "CLIPREFIX" => "",
                "RECORDING" => "0",
                "FAILOVERAPP" => "HANGUP",
                "FAILOVERAPPNOID" => ""
            )
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Edit Add Group
    public function ringeditgroup()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'RINGGROUP',
            'ACTION' => 'EDIT',
            'DATA' => array(
                "RINGGROUPID" => "34",
                "RINGGROUPNAME" => "xyxyxy56",
                "RINGGROUPDESCRIPTION" => "5689791xyz",
                "RINGDURATION" => "60",
                "CLIPREFIX" => "",
                "RECORDING" => "1",
                "FAILOVERAPP" => "VOICEMAIL",
                "FAILOVERAPPNOID" => "6"
            )
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Delete Ring Group
    public function ringedeltgroup()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'ACTION' => 'DELETE',
            'DATA' => array("RINGGROUPID" => "28")
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Duration List
    public function durationlist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'RINGDURATIONDROPDOWN',
            'ACTION' => 'LIST',
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Extension List
    public function extlist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'RINGGROUP',
            'ACTION' => 'EXTENSIONDROPDWON',
            'DATA' => array("RINGGROUPID" => "1")
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Failure List
    public function failurelist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'RINGGROUPFAILOVER',
            'ACTION' => 'LIST',
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR List
    public function ivrlist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'IVRDROPDOWN',
            'ACTION' => 'LIST',
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Update Ring group
    public function updateringgroup()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'RINGGROUP',
            'ACTION' => 'EDIT',
            'DATA' => array(
                "RINGGROUPID" => "34",
                "FAILOVERAPP" => "VOICEMAIL",
                "FAILOVERAPPNOID" => "2"
            )
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
}
