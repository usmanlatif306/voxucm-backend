<?php

namespace App\Models;

use App\Models\Content\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'user_id',
        // 'product_id',
        // 'order_status',
        // 'payment_status',
        // 'expiry_date',
        'user_id', 'product_id', 'did_id', 'area_code_id', 'city', 'dialing_code', 'price', 'order_status', 'payment_id', 'invoiced',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function did()
    {
        return $this->belongsTo(Did::class);
    }

    public function billdetail()
    {
        return $this->hasOne(BillDetail::class);
    }

    public function prisonerdetail()
    {
        return $this->hasOne(PrisonerDetail::class);
    }
}
