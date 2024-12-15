<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'appName' => config('app.name'),
            'currentSeason' => 2024,
            'meta' => [
                'keywords' => 'table tennis, east lancashire, lancashire, ping pong, league, elttl, east lancashire table tennis league',
                'description' => 'The East Lancashire Table Tennis League, including Hyndburn, Rossendale, Burnley, Nelson and Ribble Valley Founded 2001 (Formerly known as the Hyndburn Table Tennis League founded in 1974)',
            ],
            'auth' => [
                'user' => $request->user(),
            ],
        ];
    }
}
