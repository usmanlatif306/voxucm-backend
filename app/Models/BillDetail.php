<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'fname',
        'sname',
        'email',
        'number',
        'address',
        'city',
        'country',
        'postcode',
        'area_prefix',
        'pay_method',
        'card_number',
        'mm_expiry',
        'year_expiry',
        'card_cvc',
        'card_holder_name',
    ];
}
