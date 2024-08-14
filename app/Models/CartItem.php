<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function spack()
    {
        return $this->belongsTo(Spack::class);
    }


}
