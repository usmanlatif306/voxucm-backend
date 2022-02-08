<?php

namespace App\Models;

use App\Models\Content\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'expired_at', 'month', 'minutes', 'allowed_dids'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected $casts = [
        'expired_at' => 'datetime',
    ];
}
