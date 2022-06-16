<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Urls\StoreRequest;
use App\Http\Resources\Api\V1\UrlResource;
use App\Models\Url;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function store(StoreRequest $request): UrlResource
    {
        $shortUrl = Url::create([
            'origin_url' => $request->origin_url,
            'expired_at' => $request->expired_at,
            'stat_link' => mb_strtolower(Str::random(12)),
            'short_link' => mb_strtolower(Str::random(8)),
        ]);

        return UrlResource::make($shortUrl);
    }
}
