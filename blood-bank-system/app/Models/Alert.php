<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alert extends Model
{ 
    protected $guarded = [];

      public function refrigerator(): BelongsTo
    {
        return $this->belongsTo(Refrigerator::class);
    }
}
