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

    public function profiles()
    {
        return $this->hasMany(Profile::class, 'categoryId', 'id');
    }
}
