<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Did extends Model
{
    use HasFactory;
    protected $fillable = [
        'status', 'city_id', 'dialing_code'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
