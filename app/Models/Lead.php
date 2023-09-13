<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId','categoryId','status'
    ];
    public function user(){
        return $this->belongsTo(User::class,'userId');
    }
    public function  categories(){
        return $this->belongsTo(Category::class,'categoryId');
    }
}
