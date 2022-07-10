<?php

namespace App\Models\Banner;

use App\Traits\ActiveModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory;
    use ActiveModel;
    protected $casts = [
        'is_active' => 'boolean',

    ];

    public function scopeSmallBanners($query)
    {
        return $query->where('type', 'small');
    }
    public function scopeMediumBanners($query)
    {
        return $query->where('type', 'medium');
    }
    public function scopeLargeBanners($query)
    {
        return $query->where('type', 'large');
    }
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/images/banners/' . $this->image) : null;
    }
}