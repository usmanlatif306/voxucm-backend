<?php

namespace App\Http\Controllers;

use App\Models\Voxucm;
use Illuminate\Http\Request;

class QueuesController extends Controller
{
    // Queues List
    public function queueslist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'QUEUES',
            'ACTION' => 'LIST'

        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Add Queues
    public function addqueues()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'QUEUES',
            'ACTION' => 'ADD',
            'DATA' => array(
                "QUEUENAME" => "545452",
                "QUEUEMOH" => "5",
                "RINGTIMEOUT" => "10",
                "RECORDING" => "1",
                "RETRY" => "123",
                "ANNOUNCEMENT" => "2",
                "CLIPREFIXNAME" => "xyxy",
                "STRATEGY" => "roundrobin",
                "WEIGHT" => "1"
            )
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Update Queues
    public function updatequeues()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'QUEUES',
            'ACTION' => 'Edit',
            'DATA' => array(
                "QUEUENAME" => "545452",
                "QUEUEMOH" => "5",
                "RINGTIMEOUT" => "10",
                "RECORDING" => "1",
                "RETRY" => "123",
                "ANNOUNCEMENT" => "2",
                "CLIPREFIXNAME" => "xyxy",
                "STRATEGY" => "roundrobin",
                "WEIGHT" => "1"
            )
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Delete Queues
    public function deletequeues()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'QUEUES',
            'ACTION' => 'DELETE',
            'DATA' => array("QUEUEID" => "2")
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Queues MOH List
    public function quemohlist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'MOHDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Queues Announcement List
    public function queannouncelist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'MOHDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Queues Strategy List
    public function questrategylist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'STRATEGYDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Queues Weight List
    public function queweightlist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'WEIGHTDROPDOWN',
            'ACTION' => 'LIST'

        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Queues Mapped Agent
    public function quemapagent()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'QUEUES',
            'ACTION' => 'AGENTLIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Queues Drop List
    public function quedroplist()
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
    // Agent Drop List
    public function agentdroplist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'AGENTEXTENSIONDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Penality List
    public function penalitylist()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'PENALTYDROPDOWN',
            'ACTION' => 'LIST'
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Add mapped agent
    public function addquemapagent()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'ACTION' => 'MAPPAGENT',
            'DATA' => array(
                "QUEUEID" => "1",
                "EXTENSIONID" => "23",
                "PENALTY" => "1"
            )
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Delete agent
    public function quedeleteagent()
    {
        $postdata = json_encode(array(
            'APIUSER' => '21_apiuser',
            'APIPASSWORD' => MD5('123456'),
            'SECTION' => 'QUEUES',
            'ACTION' => 'AGENTDELETE',
            'DATA' => array("AGENTID" => "12")
        ));
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
}
