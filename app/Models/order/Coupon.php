<?php

namespace App\Models\order;

use App\Traits\ActiveModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory, ActiveModel;
    protected $fillable = [
        'code',
        'type',
        'amount',
        'expires_at',
        'minimum_purchases',
        'use_times',
        'used_times'
    ];
    protected $casts = [
        'is_active' => 'boolean',

    ];
    public function scopeNotExpired($query)
    {
        return $query->whereDate('expires_at', '>', date('Y-m-d'));
    }
    public function scopeNotReachedMaximumUses($query)
    {
        return $query->whereColumn('used_times', '<', 'use_times');
    }
}