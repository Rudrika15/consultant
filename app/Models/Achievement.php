<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'photo',
    ];
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'userId');
    }
}
