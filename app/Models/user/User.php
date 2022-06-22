<?php

namespace App\Models\user;

use App\Models\product\Product;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'gender',
        'phone_number'
    ];
    protected $appebds = [
        'avatar_url',
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

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) =>  Hash::make($value),
        );
    }
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

    public function productReviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    public function getAvatarUrlAttribute()
    {
        if ($this->gender == 'Male') {
            return asset('assets/images/avatars/avatar_male.png');
        }

        return asset('assets/images/avatars/avatar_female.png');
    }
}