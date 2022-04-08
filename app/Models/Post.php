<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Post Class
 */
class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    protected $appends = ['ticket'];

    /**
     * @param  $value
     * @return mixed
     */
    public function getObjectsAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getTicketAttribute(): string
    {
        return $this->getFirstMediaUrl('tickets', 'thumb');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('travels');
        $this->addMediaCollection('colis');
    }

    /**
     * @throws InvalidManipulation
     */
    public function registerAllMediaConversions(): void
    {
        $this->addMediaConversion('thumb')
            ->width(1024)
            ->height(768)
            ->sharpen(10);
    }
}
