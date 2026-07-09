<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class BloodBank extends Model
{
    protected $guarded = [];

        public function refrigerators(): HasMany
    {
        return $this->hasMany(Refrigerator::class);
    }

}
