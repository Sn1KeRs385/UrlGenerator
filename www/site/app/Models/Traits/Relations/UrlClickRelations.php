<?php

namespace App\Models\Traits\Relations;

use App\Models\Url;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait UrlClickRelations
{
    public function url(): BelongsTo
    {
        return $this->belongsTo(Url::class);
    }
}
