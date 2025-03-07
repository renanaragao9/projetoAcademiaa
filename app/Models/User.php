<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\ficha;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'sexo',
        'date',
        'profile',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function fichas() {
        return $this->hasMany(ficha::class, 'id_user_fk');
    }

    public function fichasCreator() {
        return $this->hasMany(ficha::class, 'id_user_creator_fk');
    }

    public function assessments() {
        return $this->hasMany(assessment::class, 'id_user_fk');
    }

    public function medias() {
        return $this->hasMany(media::class, 'id_user_fk');
    }
    
    public function payment() {
        return $this->hasMany(media::class, 'user_id');
    }  

    public function paymentCreator() {
        return $this->hasMany(media::class, 'user_id_creator');
    }
    
    public function expense() {
        return $this->hasMany(media::class, 'user_id');
    }

}
