<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'userId');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'userId');
    }
    public function states(){
        return $this->hasMany(State::class,'id','state');
    }
    public function cities(){
        return $this->hasMany(City::class,'id','city');
    }
    // public function categories(){
    //     return $this->hasMany(Category::class,'id','categoryId');
    // }
    public function categories(){
        return $this->hasOne(Category::class,'id','categoryId');
    }
    public function packages(){
        return $this->hasOne(Package::class,'id','packageId');
    }
}
