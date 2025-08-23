<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'product_id'
    ];

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getProductImageUrlAttribute()
    {
        return asset('uploads/' . $this->name);
    }
}
