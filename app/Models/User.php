<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'phone_number',
        'profile_picture',
        'description',
        'verified',
        'verified_at',
        'brand_name',
        'first_name',
        'last_name',
        'location',
    ];

    protected $attributes = [

        'profile_picture' => '',
        'description' => '',
        'verified' => false,
        'verified_at' => null,
        'first_name' => '',
        'last_name' => '',
        'location' => '',
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


    public function services(): HasMany
    {
        return $this->hasMany('App\Models\Service');
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
