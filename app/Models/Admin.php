<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @mixin IdeHelperAdmin
 */
class Admin extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    protected $table = 'admins';
    protected $guarded = array();
}
