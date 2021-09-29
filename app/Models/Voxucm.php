<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voxucm extends Model
{
    use HasFactory;

    static public function curlRequest($postdata)
    {
        $ch = curl_init();

        // Set SERVER API URL
        curl_setopt($ch, CURLOPT_URL, 'http://141.94.55.55/voxucm/api/api.php');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'request=' . $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        return $server_output;
    }
}
