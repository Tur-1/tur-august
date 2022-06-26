<?php

namespace App\Models\user;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'city',
        'street',
        'phone_number',
        'address'
    ];

    public function setFullNameAttribute($value)
    {
        $this->attributes['full_name'] = Str::title($value);
    }
}