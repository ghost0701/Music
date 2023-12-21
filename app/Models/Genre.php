<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded = [
        'id',
    ];

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }
}