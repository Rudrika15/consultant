<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
<<<<<<< HEAD
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
=======
    use HasApiTokens, HasFactory, Notifiable,HasRoles;
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
<<<<<<< HEAD
=======
        'lastName',
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
        'email',
        'password',
        'stateId',
        'cityId',
        'contactNo',
        'gender',
        'birthdate',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
<<<<<<< HEAD

    public function profile()
    {
        return $this->hasOne(Profile::class, 'userId');
    }
=======
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
}