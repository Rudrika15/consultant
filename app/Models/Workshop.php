<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function workshops()
    {
        return $this->belongsTo(Workshop::class, 'workshopId');
    }
}
