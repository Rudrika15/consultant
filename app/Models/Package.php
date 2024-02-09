<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasMany(User::class, 'userId', 'id');
    }

    public function profiles()
    {
        return $this->hasMany(Profile::class, 'packageId');
    }
}
