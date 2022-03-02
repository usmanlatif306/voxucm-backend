<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallForwarding extends Model
{
    use HasFactory;

    protected $fillable = ['subscriber_id', 'call_type', 'destination_number', 'status'];
}
