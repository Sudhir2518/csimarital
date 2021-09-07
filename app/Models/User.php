<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'surname',
        'church',
        'mobile',
        'profile_photo',
        'email',
        'password',
        'ticket',
        'email_verified_at',
        'forgot_token',
        'isAdmin',
        'agree',
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

    public function Vuser()
    {
        return $this->hasOne(Vuser::class);
    }

    public function matches(): HasMany
    {
        return $this->hasMany(Matche::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }


}
