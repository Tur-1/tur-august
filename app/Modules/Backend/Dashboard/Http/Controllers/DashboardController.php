<?php

namespace App\Modules\Backend\Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Backend\Dashboard\Services\DashboardService;

class DashboardController extends Controller
{



    public function dashboardPage(DashboardService $dashboardService)
    {



        $categoryCount = $dashboardService->getCategoryCount();
        $productsCount = $dashboardService->getProductsCount();
        $monthlyEarning = $dashboardService->getMonthlyEarning();
        $revenue = $dashboardService->getRevenue();
        $orders = $dashboardService->getOrders();

        return view('Backend.pages.dashboard.dashboard-page', compact('orders', 'monthlyEarning', 'productsCount', 'categoryCount', 'revenue'));
    }
}