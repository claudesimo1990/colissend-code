<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Message extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fromContact(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'from');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'from');
    }
}