<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vox extends Model
{
    use HasFactory;
    protected $table = 'vox_tenant';
    protected $connection = "mysql2";
}
