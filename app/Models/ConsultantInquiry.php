<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultantInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'inquiry',
        'userId',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
