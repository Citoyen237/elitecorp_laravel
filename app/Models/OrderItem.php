<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
       'order_id',
       'spack_id',
       'expiration_date',
       'quantity',
       'price',

    ];


    protected $dates = ['expiration_date'];

    public function spack()
    {
        return $this->belongsTo(Spack::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getExpirationDateAttribute($value)
    {
        return Carbon::parse($value);
    }
}
