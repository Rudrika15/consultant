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
    public function userstate(){
        return $this->hasMany(User::class, 'id', 'state');
    }
    public function usercity(){
        return $this->hasMany(User::class, 'id', 'city');
    }
}
