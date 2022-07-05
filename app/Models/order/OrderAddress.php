<?php

namespace App\Models\order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;

    protected $table = 'order_address';
    protected $fillable = [
        'order_id',
        'full_name',
        'address',
        'city',
        'phone_number',
        'street',

    ];
}