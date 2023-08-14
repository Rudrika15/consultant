<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMaster extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'userId');
    }
    public function socialLink()
    {
        return $this->hasMany(SocialLink::class, 'socialMediaMasterId', 'id');
    }
}
