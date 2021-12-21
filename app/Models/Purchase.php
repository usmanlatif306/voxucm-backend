<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'country', 'city', 'prefix', 'setup_fee', 'monthly_fee', 'did', 'note', 'routes', 'redirect', 'voice_mail', 'voice_id', 'voice_mail_status', 'sip_address', 'is_route', 'is_redirect', 'is_voice_mail', 'is_sip'
    ];
    // protected $fillable = [
    //     '*',
    // ];

    public function purchase_details()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
