<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'cityName', 'stateId'
    ];
    public function state()
    {
        return $this->belongsTo(State::class, 'stateId');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'userId');
    }
}
