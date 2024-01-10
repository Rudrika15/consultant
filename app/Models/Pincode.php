<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pincode extends Model
{
    use HasFactory;

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'cityId');
    }
    public function cityData()
    {
        return $this->hasMany(City::class, 'id', 'cityId');
    }
}
