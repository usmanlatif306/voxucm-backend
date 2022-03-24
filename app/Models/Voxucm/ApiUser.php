<?php

namespace App\Models\Voxucm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiUser extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'vox_apiuser';
    protected $guarded = [];
    public $timestamps = false;
}
