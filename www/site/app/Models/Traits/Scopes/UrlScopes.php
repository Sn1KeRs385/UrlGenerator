<?php

namespace App\Models\Traits\Scopes;

use Carbon\Carbon;

trait UrlScopes
{
    public function scopeActive($query)
    {
        return $query->where(function ($query) {
            $query->whereNull('expired_at')
                ->orWhere('expired_at', '>', Carbon::now());
        });
    }
}
