<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Services\ShareInertiaDataService;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */



    protected $rootView = 'Frontend.layouts.app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        $inertiaDataService = new ShareInertiaDataService();
        return array_merge(parent::share($request), [
            'sections' => $inertiaDataService->getCategoriesSections(),
            'cartCounter' => $inertiaDataService->getCartCounter(),
            'user' => $inertiaDataService->getAuthenticatedUser(),
            'toast' => Session::get('toast'),
            'requireAuth' => Session::get('requireAuth', ['status' => false]),
            'cartDetailsWithCoupon' => Session::get('cartDetailsWithCoupon'),


        ]);
    }
}