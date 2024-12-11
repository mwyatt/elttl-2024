<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContentModel extends Model
{
    /** @use HasFactory<\Database\Factories\ContentFactory> */
    use HasFactory;

    public function metas(): HasMany
    {
        return $this->hasMany(ContentMetaModel::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }
}
