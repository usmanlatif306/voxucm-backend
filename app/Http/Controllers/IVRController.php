<?php

namespace App\Http\Controllers;

use App\Models\Voxucm;
use Illuminate\Http\Request;

class IVRController extends Controller
{
    // IVR Lists
    public function ivrlist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'IVR',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Add IVR
    public function addivr()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'IVR',
            'ACTION' => 'ADD',
            'DATA' => array(
                "IVRNAME" => "sampleivr212",
                "IVRDESCRIPTION" => "abc",
                "RETRY" => "1",
                "IVRMESSAGESOUNDID" => "2",
                "DTMFWAITTIME" => "20"
            )
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Edit IVR
    public function editlist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'IVR',
            'ACTION' => 'EDIT',
            'DATA' => array(
                "IVRID" => "6",
                "IVRNAME" => "sampleivr2122",
                "IVRDESCRIPTION" => "abc",
                "RETRY" => "1",
                "IVRMESSAGESOUNDID" => "2",
                "DTMFWAITTIME" => "20"
            )
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Delete IVR
    public function deletelist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'IVR',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Retry
    public function ivrretry()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'RETRYROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Sound Lists
    public function getsoundlist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'SOUNDSDROPDWON',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR DTMP Wait
    public function ivrdtmpwait()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'DTMFWAITTIMEDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Add IVR Option
    public function addivroption()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'IVR',
            'ACTION' => 'IVROPTIONS',
            'DATA' => array(
                "IVRID" => "6",
                "OPTIONINPUT" => "1",
                "IVRDESTAPP" => "EXTENSION",
                "DESTINATIONNUMBERID" => "2"
            )
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Delete IVR Option
    public function deleteivroption()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'IVR',
            'ACTION' => 'DELETE',
            'DATA' => array("IVRID" => "6")
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Destination
    public function ivrdestinations()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'IVRFAILOVER',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Destination Numbers
    public function ivrdestinationsnumbers()
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
    // IVR Announcement Destination Numbers
    public function ivrannoundestnum()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'ANNOUNCEMENTDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Destination Numbers Dropdown
    public function ivrdestinationsdrop()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'IVRDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Voice mail Destination Numbers Dropdown
    public function ivrvoicemail()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'VOICEMAILDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Conference Destination Numbers Dropdown
    public function ivrconference()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'CONFERENCEDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Ring Group Destination Numbers Dropdown
    public function ivrringgroup()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'RINGGROUPDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Queues Destination Numbers Dropdown
    public function ivrqueues()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'QUEUESDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
}
