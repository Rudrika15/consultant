<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterWorkshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'workshopId',
    ];

    // Define relationships if needed
    public function users()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function workshops()
    {
        return $this->hasOne(Workshop::class, 'id', 'workshopId');
    }
}
