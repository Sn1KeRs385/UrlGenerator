<?php

namespace App\Models;

use App\Models\Traits\Attributes\UrlAttributes;
use App\Models\Traits\Relations\UrlRelations;
use App\Models\Traits\Scopes\UrlScopes;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use UrlAttributes;
    use UrlRelations;
    use UrlScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'origin_url',
        'short_link',
        'stat_link',
        'expired_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'expired_at' => 'datetime',
    ];
}
