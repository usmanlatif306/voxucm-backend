<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'descrip', 'ser1', 'ser1_count', 'ser2', 'ser2_count', 'ser3', 'ser3_count', 'ser4', 'ser4_count',
    ];
}
