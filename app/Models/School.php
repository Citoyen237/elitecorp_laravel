<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'slug',
    ];

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function curriculum()
    {
        return $this->hasMany(Curriculum::class);
    }

    public function levels()
    {
        return $this->hasMany(Level::class);
    }

    public function streams()
    {
        return $this->hasMany(Stream::class);
    }

   

}
