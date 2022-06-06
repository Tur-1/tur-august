<?php

namespace App\Models;

use App\Models\product\Product;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function shoppingCartProducts()
    {
        return $this->belongsToMany(Product::class, 'shopping_carts', 'user_id', 'product_id')
            ->withPivot(['size_id', 'quantity', 'id'])
            ->with(['sizeOptions'])
            ->WithMainProductImage()
            ->WithBrandName()
            ->Active()
            ->latest();
    }
    public function shoppingCart()
    {
        return $this->belongsToMany(Product::class, 'shopping_carts', 'user_id', 'product_id');
    }

    public function shoppingCartHas($product_id, $size_id)
    {
        return  $this->shoppingCart()
            ->wherePivot('product_id',  $product_id)
            ->wherePivot('size_id', $size_id)
            ->exists('size_id');
    }

    public function wishlistProducts()
    {
        return $this->belongsToMany(Product::class, 'wishlists')->WithMainProductImage()
            ->WithBrandName()
            ->Active();
    }
    public function wishlist()
    {
        return $this->belongsToMany(Product::class, 'wishlists');
    }
    public function wishlistHas($product_id)
    {
        return  $this->wishlist()->where('product_id', $product_id)->exists('product_id');
    }
}