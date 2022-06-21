<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Models\Voxucm\ApiUser;
use App\Models\Voxucm\VoxTenant;
use App\Models\Voxucm\VoxUser;

/**
 * Class TenantService
 * @package App\Services
 */
class TenantService
{
    public function createVoxUser($name, $email, $password)
    {
        $username = Str::lower(str_replace(' ', '', $name));

        $voxuser = VoxUser::create([
            'Username' => $name,
            'password' => sha1($password),
            'RoleId' => 25
        ]);

        if ($voxuser) {
            $voxtenant = VoxTenant::create([
                'login_id' => $voxuser->id,
                'firstname' => $name,
                'username' => $name,
                'emailaddress' => $email,
                'payment_terms' => 10,
            ]);
            $extension = $voxtenant->id . '_' . $username;
            $user = ApiUser::create([
                'apiusername' => $username,
                'apisecret' => $password,
                'status' => 1,
                'tenant_id' => $voxtenant->id,
                'extension' => $extension,
            ]);
        }
        return $user;
    }
}
