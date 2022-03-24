<?php

namespace App\Http\Controllers;

use App\Models\Voxucm;
use Illuminate\Http\Request;

class RingController extends Controller
{
    // Ring group list
    public function ringgroup()
    {
        $postdata = array(
            'SECTION' => 'RINGGROUP',
            'ACTION' => 'LIST',
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Ring Add extension
    public function ringaddext()
    {
        $postdata = array(
            'SECTION' => 'RINGGROUP',
            'ACTION' => 'ADDEXTENSION',
            'DATA' => array(
                "RINGGROUPID" => "1",
                "EXTENSIONID" => "1"
            )
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Ring Delete extension
    public function ringdeltext()
    {
        $postdata = array(
            'SECTION' => 'RINGGROUP',
            'ACTION' => 'DELETEEXTENSION',
            'DATA' => array(
                "RINGGROUPID" => "34",
                "EXTENSIONID" => "12"
            )
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Ring Add Group
    public function ringaddgroup()
    {
        $postdata = array(
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
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Edit Add Group
    public function ringeditgroup()
    {
        $postdata = array(
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
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Delete Ring Group
    public function ringedeltgroup()
    {
        $postdata = array(
            'ACTION' => 'DELETE',
            'DATA' => array("RINGGROUPID" => "28")
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Duration List
    public function durationlist()
    {
        $postdata = array(
            'SECTION' => 'RINGDURATIONDROPDOWN',
            'ACTION' => 'LIST',
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Extension List
    public function extlist()
    {
        $postdata = array(
            'SECTION' => 'RINGGROUP',
            'ACTION' => 'EXTENSIONDROPDWON',
            'DATA' => array("RINGGROUPID" => "1")
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Failure List
    public function failurelist()
    {
        $postdata = array(
            'SECTION' => 'RINGGROUPFAILOVER',
            'ACTION' => 'LIST',
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR List
    public function ivrlist()
    {
        $postdata = array(
            'SECTION' => 'IVRDROPDOWN',
            'ACTION' => 'LIST',
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Update Ring group
    public function updateringgroup()
    {
        $postdata = array(
            'SECTION' => 'RINGGROUP',
            'ACTION' => 'EDIT',
            'DATA' => array(
                "RINGGROUPID" => "34",
                "FAILOVERAPP" => "VOICEMAIL",
                "FAILOVERAPPNOID" => "2"
            )
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
}
