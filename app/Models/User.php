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
        'name',
        'email',
        'password',
        'confirmation_token'
    ];

    protected $appends = ['avatar', 'info', 'travels', 'packs'];

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
        return $this->getFirstMediaUrl('avatar', 'thumb');
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
}
