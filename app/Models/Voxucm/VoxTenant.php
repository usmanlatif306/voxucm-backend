<?php

namespace App\Models\Voxucm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoxTenant extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'vox_tenant';
    // protected $fillable = ['login_id', 'payment_terms'];
    protected $guarded = [];

    public $timestamps = false;

    // public function getRouteKeyName()
    // {
    //     return 'tenant_id';
    // }
}
