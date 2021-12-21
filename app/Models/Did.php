<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Did extends Model
{
    use HasFactory;
    protected $fillable = [
        'status'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
