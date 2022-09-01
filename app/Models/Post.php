<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @mixin IdeHelperPost
 */
class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    protected $appends = ['ticket', 'countReservations'];

    public function getObjectsAttribute($value)
    {
        return json_decode($value);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getCountReservationsAttribute(): int
    {
        return $this->reservations->count();
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
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

    public function registerAllMediaConversions(): void
    {
        $this->addMediaConversion('thumb')
            ->width(1024)
            ->height(768)
            ->sharpen(10);
    }
}
