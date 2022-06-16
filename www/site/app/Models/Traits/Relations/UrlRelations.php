<?php

namespace App\Models\Traits\Relations;

use App\Models\UrlClick;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait UrlRelations
{
    public function clicks(): HasMany
    {
        return $this->hasMany(UrlClick::class);
    }
}
