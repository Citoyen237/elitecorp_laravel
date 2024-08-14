<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function levels()
    {
        return $this->hasMany(Level::class);
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
