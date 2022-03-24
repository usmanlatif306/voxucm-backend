<?php

namespace App\Models;

use App\Models\Voxucm\VoxUserDetail;
use App\Notifications\PasswordResetNotification;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_email_verified', 'phone', 'address', 'city', 'country', 'postcode', 'google_id', 'facebook_id', 'tenant_id', 'api_password', 'api_username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // User Details
    public function user_details()
    {
        return $this->hasOne(UserDetail::class);
    }

    // Voxucm User Details
    public function vox_user()
    {
        return $this->hasOne(VoxUserDetail::class);
    }

    // User current plan
    public function plan()
    {
        return $this->hasOne(Plan::class)->where('expired_at', '>=', now())->latest();
    }


    // User orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // User relation with purchases Numbers
    public function numbers()
    {
        // return $this->hasMany(Purchase::class);
        return $this->hasMany(Order::class)->whereNotNull('did_id');
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }
    public function sendVerificationEmail($token)
    {

        $this->notify(new VerifyEmailNotification($token));
    }
}

class PasswordReset extends ResetPassword
{
    public function toMail($notifiable)
    {
        $url = "localhost:3000/reset-password/" . $notifiable->getEmailForPasswordReset() . "/" . $this->token;
        return (new MailMessage)
            ->subject(Lang::get('Reset Password'))
            ->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
            ->action(Lang::get('Reset Password'), $url)
            ->line(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))
            ->line(Lang::get('If you did not request a password reset, no further action is required.'));
    }
}
