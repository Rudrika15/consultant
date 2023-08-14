<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;
    public function social_masters()
    {
        return $this->hasMany(SocialMaster::class,'id', 'socialMediaMasterId');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'userId');
    }
}
