<?php

namespace App\Http\Controllers;

use App\Models\Voxucm;
use Illuminate\Http\Request;

class QueuesController extends Controller
{
    // Queues List
    public function queueslist()
    {
        $postdata = array(
            'SECTION' => 'QUEUES',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Add Queues
    public function addqueues()
    {
        $postdata = array(
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
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Update Queues
    public function updatequeues()
    {
        $postdata = array(
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
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Delete Queues
    public function deletequeues()
    {
        $postdata = array(
            'SECTION' => 'QUEUES',
            'ACTION' => 'DELETE',
            'DATA' => array("QUEUEID" => "2")
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Queues MOH List
    public function quemohlist()
    {
        $postdata = array(
            'SECTION' => 'MOHDROPDOWN',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Queues Announcement List
    public function queannouncelist()
    {
        $postdata = array(
            'SECTION' => 'MOHDROPDOWN',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Queues Strategy List
    public function questrategylist()
    {
        $postdata = array(
            'SECTION' => 'STRATEGYDROPDOWN',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Queues Weight List
    public function queweightlist()
    {
        $postdata = array(
            'SECTION' => 'WEIGHTDROPDOWN',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Queues Mapped Agent
    public function quemapagent()
    {
        $postdata = array(
            'SECTION' => 'QUEUES',
            'ACTION' => 'AGENTLIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Queues Drop List
    public function quedroplist()
    {
        $postdata = array(
            'SECTION' => 'QUEUESDROPDOWN',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Agent Drop List
    public function agentdroplist()
    {
        $postdata = array(
            'SECTION' => 'AGENTEXTENSIONDROPDOWN',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Penality List
    public function penalitylist()
    {
        $postdata = array(
            'SECTION' => 'PENALTYDROPDOWN',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Add mapped agent
    public function addquemapagent()
    {
        $postdata = array(
            'ACTION' => 'MAPPAGENT',
            'DATA' => array(
                "QUEUEID" => "1",
                "EXTENSIONID" => "23",
                "PENALTY" => "1"
            )
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
    // Delete agent
    public function quedeleteagent()
    {
        $postdata = array(
            'SECTION' => 'QUEUES',
            'ACTION' => 'AGENTDELETE',
            'DATA' => array("AGENTID" => "12")
        );
        $data = Voxucm::curlRequest($postdata);
        return $data;
    }
}
