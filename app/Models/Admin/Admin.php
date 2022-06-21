<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'password', 'is_email_verified', 'role_id', 'status'
    ];
}
