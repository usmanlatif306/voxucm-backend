<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'purchase_id', 'routes', "redirect", 'voice_mail', 'sip_address',
    // ];
    protected $fillable = [
        '*',
    ];
}
