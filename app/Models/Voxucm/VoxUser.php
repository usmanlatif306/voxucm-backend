<?php

namespace App\Models\Voxucm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoxUser extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'gui_loginuser';

    protected $fillable = ['Username', 'password', 'RoleId'];

    public $timestamps = false;
}
