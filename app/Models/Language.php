<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    public function language_masters()
    {
        return $this->hasMany(LanguageMaster::class,'id', 'languageId');
    }
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'userId');
    }
}
