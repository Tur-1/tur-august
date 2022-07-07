<?php

namespace App\Modules\Backend\Dashboard\Services;

use Carbon\Carbon;
use App\Models\order\Order;
use App\Models\product\Product;
use App\Models\product\Category;

class DashboardService
{
  private $products_count;

  public function getMonthlyEarning()
  {
    $currentMonth =  date('m');
    $currentYear =  date('Y');

    $MonthlyEarning = Order::Completed()
      ->whereYear('created_at', $currentYear)
      ->whereMonth('created_at', $currentMonth)
      ->sum('total');

    return $MonthlyEarning;
  }
  public function getRevenue()
  {
    return Order::Completed()->sum('total');
  }
  public function getOrders()
  {
    return Order::with('user:id,name', 'coupon:code,id', 'status:id,name')
      ->withCount('products')
      ->latest()
      ->get()
      ->take(12);
  }
  public function getCategoryCount()
  {
    return Category::has('products')->select('id')->count();
  }
  public function getProductsCount()
  {
    return Product::select('id')->count();
  }
}