<?php

namespace App\Services;

use App\Models\Voxucm;

/**
 * Class VoiceMailService
 * @package App\Services
 */
class VoiceMailService
{
    public function fetchVoiceMails()
    {
        $postdata = array(
            'SECTION' => 'VOICEMAIL',
            'ACTION' => 'LIST'
        );
        $data = Voxucm::curlRequest($postdata);
        $data = json_decode($data, true);
        return $data;
    }
}
