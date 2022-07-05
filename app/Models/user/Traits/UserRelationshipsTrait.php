<?php

namespace App\Models\user\Traits;

use App\Models\order\Order;
use App\Models\product\Product;
use App\Models\user\UserAddress;
use App\Models\product\ProductReview;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait UserRelationshipsTrait
{
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
    public function checkoutProducts()
    {
        return $this->belongsToMany(Product::class, 'shopping_carts', 'user_id', 'product_id')
            ->WithCheckoutFields()
            ->withPivot(['size_id', 'quantity', 'id'])
            ->with(['sizeOptions']);
    }
    public function shoppingCartProducts()
    {
        return $this->belongsToMany(Product::class, 'shopping_carts', 'user_id', 'product_id')
            ->WithShoppingCartFields()
            ->withPivot(['size_id', 'quantity', 'id'])
            ->with(['sizeOptions'])
            ->WithMainProductImage()
            ->WithBrandName()
            ->Active()
            ->latest();
    }
    public function shoppingCart()
    {
        return $this->belongsToMany(Product::class, 'shopping_carts', 'user_id', 'product_id')
            ->select('products.id')
            ->withPivot(['size_id', 'quantity', 'id']);
    }
    public function wishlistProducts()
    {
        return $this->belongsToMany(Product::class, 'wishlists')
            ->WithShopPageFields()
            ->WithMainProductImage()
            ->WithBrandName()
            ->Active();
    }
    public function wishlist()
    {
        return $this->belongsToMany(Product::class, 'wishlists');
    }

    public function productReviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }
    public function addresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }


    public function shoppingCartHas($product_id, $size_id)
    {
        return  $this->shoppingCart()
            ->wherePivot('product_id',  $product_id)
            ->wherePivot('size_id', $size_id)
            ->exists('size_id');
    }

    public function wishlistHas($product_id)
    {
        return  $this->wishlist()->where('product_id', $product_id)->exists('product_id');
    }
    public function wishlistHasProducts($productIds)
    {
        return  $this->wishlist()->whereIn('product_id', $productIds)->exists('product_id');
    }
}