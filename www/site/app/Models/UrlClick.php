<?php

namespace App\Models;

use App\Models\Traits\Relations\UrlClickRelations;
use Illuminate\Database\Eloquent\Model;

class UrlClick extends Model
{
    use UrlClickRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'geo_info',
        'user_agent',
    ];
}
