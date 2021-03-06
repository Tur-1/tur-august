<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ProductImage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $appends = ['image_url'];

    protected $casts = [
        'is_main_image' => 'boolean',
    ];
    protected $fillable =
    [
        'product_id',
        'image',
        'is_main_image'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function getImageUrlAttribute()
    {
        if ($this->image) {

            return Storage::disk('s3')->url('images/products/product_' . $this->product_id . '/' . $this->image);
        } else {
            return  asset('assets/images/defult-input-image.png');
        }
    }

    public function getProductImageFolderAttribute()
    {
        return 'products/product_' . $this->product_id;
    }
    public function getProductImagePathAttribute()
    {
        return 'products/product_' . $this->product_id . '/' . $this->image;
    }
}