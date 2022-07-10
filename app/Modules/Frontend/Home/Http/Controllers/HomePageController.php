<?php

namespace App\Modules\Frontend\Home\Http\Controllers;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Modules\Frontend\Home\Services\HomePageService;

class HomePageController extends Controller
{


    public function index(HomePageService $homePageService)
    {

        $brands = $homePageService->GetBrands();
        $banners = $homePageService->getBanners();
        $smallBanners =  $homePageService->getSmallBanners($banners);
        $mediumBanners =  $homePageService->getMediumBanners($banners);
        $largeBanners = $homePageService->getLargeBanners($banners);
        $latestProducts = $homePageService->getLatestProducts();


        return Inertia::render('HomePage/Index', [

            'mediumBanners' => $mediumBanners,
            'largeBanners' => $largeBanners,
            'brands' => $brands,
            'latestProducts' => $latestProducts,
        ]);
    }
}