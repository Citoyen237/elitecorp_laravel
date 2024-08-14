<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spack extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'old_prix',
        'prix',
        'duree',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
