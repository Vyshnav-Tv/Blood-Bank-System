<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Refrigerator extends Model
{
    
    protected $guarded = [];

     public function bloodBank(): BelongsTo
    {
        return $this->belongsTo(BloodBank::class);
    }

        public function bloodBags(): HasMany
    {
        return $this->hasMany(BloodBag::class);
    }

      public function temperatureLogs(): HasMany
    {
        return $this->hasMany(TemperatureLog::class);
    }

    public function alerts(): HasMany
    {
        return $this->hasMany(Alert::class);
    }
}
