<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class UrlController extends Controller
{
    public function createForm(): \Illuminate\Contracts\View\View
    {
        return view('urls.create');
    }

    public function stats(Url $url)
    {
        return view(
            'urls.stats',
            [
                'is_active' => $url->isActive(),
                'short_url' => route('site.url.linkRedirect', ['link' => $url->short_link]),
                'clicks' => $url->clicks,
            ]
        );
    }

    public function linkRedirect(Request $request, string $link): \Illuminate\Http\RedirectResponse
    {
        /** @var Url $url */
        $url = Url::query()
            ->active()
            ->where('short_link', $link)
            ->firstOrFail();

        $userLocation = Location::get();

        $position = [$userLocation->countryName ?? null, $userLocation->cityName ?? null];
        $position = array_filter($position);
        $url->clicks()
            ->create([
                'user_agent' => $request->userAgent(),
                'geo_info' => count($position) > 0 ? implode(' ', $position) : null
            ]);

        return redirect($url->origin_url);
    }
}
