<?php

namespace App\Models\product;

use App\Models\product\Product;
use App\Traits\HasProductsWithCount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory, HasProductsWithCount;


    protected $fillable = [
        'name',
        'image',
        'slug',
    ];


    public function getImageUrlAttribute()
    {
        return Storage::disk('s3')->url('images/colors/' . $this->image);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function scopeSearch($query)
    {
        return $query->when(request()->input('search'),  fn ($query) => $query->where('name', 'LIKE', "%" . request()->input('search') . "%"));
    }
}