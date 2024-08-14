<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;


    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function streams()
    {
        return $this->hasMany(Stream::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

}
