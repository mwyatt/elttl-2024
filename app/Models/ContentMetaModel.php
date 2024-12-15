<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContentMetaModel extends Model
{
    protected $table = 'content_metas';

    public function content(): BelongsTo
    {
        return $this->belongsTo(ContentModel::class, 'content_id');
    }
}
