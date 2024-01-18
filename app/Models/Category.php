<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'catName'
    ];


    use HasFactory;
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'userId');
    }

    public function profiles()
    {
        return $this->hasOne(Profile::class, 'categoryId', 'id');
    }
}
