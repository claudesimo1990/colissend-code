<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
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
        $this->addMediaConversion('thumb')->crop(Manipulations::CROP_CENTER, 100, 100)->withResponsiveImages();
        $this->addMediaConversion('header')->crop(Manipulations::CROP_CENTER, 1425, 720)->withResponsiveImages();
        $this->addMediaConversion('contact')->crop(Manipulations::CROP_CENTER, 1425, 398)->withResponsiveImages();
        $this->addMediaConversion('destinations')->crop(Manipulations::CROP_CENTER, 800, 400)->withResponsiveImages();

    }
}
