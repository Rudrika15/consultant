<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    protected $fillable = [
        'time',
        'day',
        'userId'
    ];
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'userId');
    }
}
