<?php

namespace App\Models\Traits\Attributes;


use Carbon\Carbon;

trait UrlAttributes
{
    public function isActive(): bool {
        return !$this->expired_at || $this->expired_at->gte(Carbon::now());
    }
}
