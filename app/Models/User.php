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
        'firstname',
        'lastname',
        'country',
        'avatar',
        'birthday',
        'phone',
        'email',
        'genre',
        'password',
        'confirmation_token'
    ];

    protected $appends = ['thumb', 'avatar', 'travels', 'packs', 'myAvatar'];

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
        return $this->getFirstMediaUrl('avatar', 'post') ?? '/images/colissend/default.svg';
    }

    public function getThumbAttribute(): string
    {
        return $this->getFirstMediaUrl('avatar', 'post') ?? '/images/colissend/default.svg';
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'to');
    }

    public function friends(): HasMany
    {
        return $this->hasMany(Friends::class, 'user_id');
    }

    public function getMyAvatarAttribute()
    {
        return $this->attributes['avatar'];
    }

    public function getTravelsAttribute(): Collection
    {
        return $this->posts()->where('type', 'TRAVEL')->get(['*']);
    }

    public function getPacksAttribute(): Collection
    {
        return $this->posts()->where('type', 'PACKS')->get(['*']);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'user_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->singleFile();
    }

    public function registerAllMediaConversions(): void
    {
        $this->addMediaConversion('avatar')
            ->crop('crop-center', 150, 150);

        $this->addMediaConversion('thumb')
            ->crop('crop-center', 368, 232);

        $this->addMediaConversion('post')
            ->crop('crop-center', 100, 100);
    }
}
