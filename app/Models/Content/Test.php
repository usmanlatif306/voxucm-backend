<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'test1_name', 'test1_des', 'test1_rev',
        'test2_name', 'test2_des', 'test2_rev',
        'test3_name', 'test3_des', 'test3_rev',
    ];
}
