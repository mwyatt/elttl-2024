<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContentModel extends Model
{
    /** @use HasFactory<\Database\Factories\ContentModelFactory> */
    use HasFactory;

    protected $table = 'contents';

    public function metas(): HasMany
    {
        return $this->hasMany(
            ContentMetaModel::class,
            'content_id'
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
