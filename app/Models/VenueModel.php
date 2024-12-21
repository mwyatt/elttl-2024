<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VenueModel extends Model
{
    protected $table = 'venues';

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }
}
