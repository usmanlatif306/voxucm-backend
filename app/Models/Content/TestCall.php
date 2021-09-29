<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCall extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'detail', 'call_title', 'btn1', 'btn2',
    ];
}
