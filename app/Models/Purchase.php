<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'state', 'city', 'prefix', 'setup_fee', 'monthly_fee', 'dialing_code', 'note', 'payment_id', 'invoiced',
    ];


    public function purchase_details()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
