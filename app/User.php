<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\PasswordReset;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'email_token', 'verified', 'last_login',
        'failed_attempts', 'enabled_2fa', 'secret_2fa', 'confirmation_code',
        'confirmation_code_valid_until', 'image_id', 'agree_tos', 'agree_tos_latest', 'agree_privacy',
        'agree_privacy_latest', 'agree_dpa', 'agree_dpa_latest',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'secret_2fa', 'confirmation_code'
    ];

    /**
     * Ecrypt the user's 2fa secret.
     *
     * @param  string  $value
     * @return string
     */
    public function set2faSecretAttribute($value)
    {
        $this->attributes['secret_2fa'] = encrypt($value);
    }

    public function hasProvider()
    {
        return ($this->provider != null && $this->provider_id != null);
    }

    /**
     * Decrypt the user's 2fa secret.
     *
     * @param  string  $value
     * @return string
     */
    public function get2faSecretAttribute($value)
    {
        return decrypt($value);
    }

    public function avatar()
    {
        return $this->hasOne('App\Image', 'id', 'image_id')->withDefault(function ($image) {
            $image->url = config('app.user.default_image');
            $image->alt_tag = config('app.user.default_image');
        });
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }
}