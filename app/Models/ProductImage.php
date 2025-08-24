<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

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
        return Storage::disk('s3')->temporaryUrl($this->name, now()->addMinutes(5));
    }
}
