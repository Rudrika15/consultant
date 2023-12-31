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
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastName',
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
    public function profile()
    {
        return $this->hasOne(Profile::class, 'userId');
    }
    public function states(){
        return $this->hasOne(State::class,'id','stateId');
    }
    public function cities(){
        return $this->hasOne(City::class,'id','cityId');
    }
    public function language()
    {
        return $this->hasMany(Language::class, 'userId','id');
    }
    public function socialLink(){
        return $this->hasMany(SocialLink::class,'userId','id');
    } 
    // For user details
    public function packages(){
        return $this->hasMany(Package::class,'userId','id');
    }
    //For User Details
    public function time(){
        return $this->hasMany(Time::class,'userId','id');
    } 
    //For User Details
    public function gallery(){
        return $this->hasMany(Gallery::class,'userId','id');
    } 
    //For User Details
    public function video(){
        return $this->hasMany(Video::class,'userId','id');
    } 
    //For User Details
    public function attachments(){
        return $this->hasMany(Attachment::class,'userId','id');
    }  
    //For User Details
    public function certificate(){
        return $this->hasMany(Certificate::class,'userId','id');
    } 

    //For User Details
    public function achievement(){
        return $this->hasMany(Achievement::class,'userId','id');
    } 
    //For User Details
    public function workshop(){
        return $this->hasMany(Workshop::class,'userId','id');
    } 
}
