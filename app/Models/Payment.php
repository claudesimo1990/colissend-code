<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @mixin IdeHelperOrder
 */
class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function paymentable(): MorphTo
    {
        return $this->morphTo();
    }
}

