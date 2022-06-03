<?php

namespace App\Traits;

trait ActiveModel
{
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}