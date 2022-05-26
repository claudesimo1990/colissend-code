<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Gallery extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('header')
            ->width(1425)
            ->height(720)
            ->crop('crop-center', 1425, 720)
            ->sharpen(10)
            ->withResponsiveImages()
            ->format('jpg');

        $this->addMediaConversion('contact')
            ->width(1425)
            ->height(398)
            ->crop('crop-center', 1425, 398)
            ->sharpen(10)
            ->withResponsiveImages()
            ->format('jpg');

        $this->addMediaConversion('destinations')
            ->width(800)
            ->height(400)
            ->crop('crop-center', 800, 400)
            ->sharpen(10)
            ->withResponsiveImages()
            ->format('jpg');

        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10)
            ->format('jpg');
    }
}
