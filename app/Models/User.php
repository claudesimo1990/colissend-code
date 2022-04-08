<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use InteractsWithMedia;

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'confirmation_token'
    ];

    protected $appends = ['thumb', 'avatar', 'info', 'travels', 'packs'];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function getAvatarAttribute(): string
    {
        return $this->getFirstMediaUrl('avatar') ?? '/images/colissend/default.svg';
    }

    public function getThumbAttribute(): string
    {
        return $this->getFirstMediaUrl('avatar', 'thumb') ?? '/images/colissend/default.svg';
    }

    public function getInfoAttribute()
    {
        return Profile::find($this->attributes['id']);
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function message(): HasMany
    {
        return $this->hasMany(Message::class, 'from');
    }

    public function friends(): HasMany
    {
        return $this->hasMany(Friends::class, 'user_id');
    }

    public function getTravelsAttribute(): Collection
    {
        return $this->posts()->where('type', 'TRAVEL')->get(['*']);
    }

    public function getPacksAttribute(): Collection
    {
        return $this->posts()->where('type', 'PACKS')->get(['*']);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->singleFile();
    }

    public function registerAllMediaConversions(): void
    {
        $this->addMediaConversion('avatar')
            ->width(36)
            ->height(36)
            ->sharpen(10);

        $this->addMediaConversion('thumb')
            ->width(150)
            ->height(150)
            ->sharpen(10);
    }
}
