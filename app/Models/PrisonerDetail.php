<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrisonerDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'prison_fname',
        'prison_lname',
        'prison_number',
        'prison_status',
        'release_date',
        'prison',
        'prison_relation',
        'prison_contact',
        'prison_contact_name',
    ];
}
