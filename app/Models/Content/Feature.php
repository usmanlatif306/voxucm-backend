<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading1', 'detail1', 'heading2', 'detail2', 'heading3', 'detail3', 'heading4', 'detail4', 'heading5', 'detail5', 'heading6', 'detail6',
    ];
}
