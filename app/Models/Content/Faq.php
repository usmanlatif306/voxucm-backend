<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = [
        'faq_heading', 'faq_title', 'faq_about', 'faqs', 'image'
    ];
}
