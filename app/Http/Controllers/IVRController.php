<?php

namespace App\Http\Controllers;

use App\Models\Voxucm;
use Illuminate\Http\Request;

class IVRController extends Controller
{
    // IVR Lists
    public function ivrlist()
    {
        $postdata = array(
            'SECTION' => 'IVR',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Add IVR
    public function addivr()
    {
        $postdata = array(
            'SECTION' => 'IVR',
            'ACTION' => 'ADD',
            'DATA' => array(
                "IVRNAME" => "sampleivr212",
                "IVRDESCRIPTION" => "abc",
                "RETRY" => "1",
                "IVRMESSAGESOUNDID" => "2",
                "DTMFWAITTIME" => "20"
            )
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Edit IVR
    public function editlist()
    {
        $postdata = array(
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
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Delete IVR
    public function deletelist()
    {
        $postdata = array(
            'SECTION' => 'IVR',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Retry
    public function ivrretry()
    {
        $postdata = array(
            'SECTION' => 'RETRYROPDOWN',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Sound Lists
    public function getsoundlist()
    {
        $postdata = array(
            'SECTION' => 'SOUNDSDROPDWON',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR DTMP Wait
    public function ivrdtmpwait()
    {
        $postdata = array(
            'SECTION' => 'DTMFWAITTIMEDROPDOWN',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Add IVR Option
    public function addivroption()
    {
        $postdata = array(
            'SECTION' => 'IVR',
            'ACTION' => 'IVROPTIONS',
            'DATA' => array(
                "IVRID" => "6",
                "OPTIONINPUT" => "1",
                "IVRDESTAPP" => "EXTENSION",
                "DESTINATIONNUMBERID" => "2"
            )
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Delete IVR Option
    public function deleteivroption()
    {
        $postdata = array(
            'SECTION' => 'IVR',
            'ACTION' => 'DELETE',
            'DATA' => array("IVRID" => "6")
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Destination
    public function ivrdestinations()
    {
        $postdata = array(
            'SECTION' => 'IVRFAILOVER',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Destination Numbers
    public function ivrdestinationsnumbers()
    {
        $postdata = array(
            'SECTION' => 'EXTENSIONDROPDOWN',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Announcement Destination Numbers
    public function ivrannoundestnum()
    {
        $postdata = array(
            'SECTION' => 'ANNOUNCEMENTDROPDOWN',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Destination Numbers Dropdown
    public function ivrdestinationsdrop()
    {
        $postdata = array(
            'SECTION' => 'IVRDROPDOWN',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Voice mail Destination Numbers Dropdown
    public function ivrvoicemail()
    {
        $postdata = array(
            'SECTION' => 'VOICEMAILDROPDOWN',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Conference Destination Numbers Dropdown
    public function ivrconference()
    {
        $postdata = array(
            'SECTION' => 'CONFERENCEDROPDOWN',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Ring Group Destination Numbers Dropdown
    public function ivrringgroup()
    {
        $postdata = array(
            'SECTION' => 'RINGGROUPDROPDOWN',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // IVR Queues Destination Numbers Dropdown
    public function ivrqueues()
    {
        $postdata = array(
            'SECTION' => 'QUEUESDROPDOWN',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
}
