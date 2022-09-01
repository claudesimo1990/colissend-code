<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @mixin IdeHelperProduct
 */
class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    protected $appends = ['image'];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)
            ->withPivot('price', 'quantity');
    }

    public function getFormattedPriceAttribute(): string
    {
        return str_replace('.', ',', $this->price / 100) . '€';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('products')
        ->singleFile();
    }

    public function getImageAttribute()
    {
        $media = $this->getMedia('products')->first();
        $media->setAttribute('class', 'responsive');

        return $media('thumb')->toHtml();
    }

    public function registerAllMediaConversions(): void
    {
        $this->addMediaConversion('details')
            ->width(100)
            ->height(125)
            ->withResponsiveImages()
            ->sharpen(10);

        $this->addMediaConversion('thumb')
            ->width(362)
            ->height(180)
            ->withResponsiveImages()
            ->sharpen(10);
    }

}
