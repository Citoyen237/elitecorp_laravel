<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $fillable = [
      'file',
      'image',
      'name',
      'description',
      'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
