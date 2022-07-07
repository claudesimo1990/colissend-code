<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Blog extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['title', 'content', 'category'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('blog')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(322)
            ->height(241)
            ->sharpen(10)
            ->format('jpg');

        $this->addMediaConversion('header')
            ->width(1425)
            ->height(720)
            ->crop('crop-center', 1425, 720)
            ->sharpen(10)
            ->format('jpg');
    }
}
