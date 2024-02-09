<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'stateName'
    ];


    public function city()
    {
        return $this->hasMany(City::class, 'stateId', 'id');
    }
}
