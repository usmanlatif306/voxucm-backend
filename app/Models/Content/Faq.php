<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = [
        'intro_title', 'intro1', 'intro2', 'intro3', 'q1', 'ans1', 'q2', 'ans2', 'q3', 'ans3', 'q4', 'ans4', 'q5', 'ans5', 'image'
    ];
}
