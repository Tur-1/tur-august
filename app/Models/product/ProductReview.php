<?php

namespace App\Models\product;

use Carbon\Carbon;
use App\Models\user\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductReview extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'user_id',
        'product_id',
        'comment',
        'review_id',
        'is_read'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->select('name', 'id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class)
            ->select('id', 'name', 'slug')
            ->WithMainProductImage();
    }
    public function reply()
    {
        return $this->hasOne(ProductReview::class, 'review_id')->with('user');
    }
    public function scopeIsNotRead($query)
    {
        return $query->where('is_read', 0);
    }
}