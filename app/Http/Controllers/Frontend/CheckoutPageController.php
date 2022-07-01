<?php

namespace App\Http\Controllers\Frontend;

use App\Exceptions\InValidCouponCodeException;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Frontend\Coupon\CouponService;
use App\Services\Frontend\Pages\ShoppingCartPageService;
use Illuminate\Support\Facades\Session;

class CheckoutPageController extends Controller
{

    public $cartPageService;
    public $products;
    public $outOfStockProducts;
    public $cartDetails = [];

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->cartPageService = new ShoppingCartPageService();
            $this->products =  $this->cartPageService->getUserShoppingCart();
            $this->outOfStockProducts = $this->cartPageService->getOutOfStockProducts();


            $this->cartDetails = [
                'shipmentFees' => $this->cartPageService->getShipmentFees(),
                'cartSubTotal' => $this->cartPageService->getCartSubTotal(),
                'cartTotal' => $this->cartPageService->getCartTotal(),
            ];

            Session::put('cartDetails',  $this->cartDetails);
            return $next($request);
        });
    }
    public function index()
    {
        return Inertia::render('CheckoutPage/Index', [
            'cartCounter' => count($this->products),
            'products' => $this->products,
        ]);
    }

    public function applyCoupon(Request $request, CouponService $couponService)
    {
        $request->validate(['code' => 'required|string']);

        try {
            $coupon = $couponService->getCoupon($request->code);
        } catch (InValidCouponCodeException $ex) {
            return redirect()->back()->withErrors(['code' => $ex->getMessage()]);
        }

        $cartTotal = $this->cartDetails['cartTotal'];
        $this->cartDetails['cartTotal'] = $couponService->getCartTotal($cartTotal);
        $this->cartDetails['coupon'] =   [
            'code' => $coupon->code,
            'discounted_value' =>  $couponService->getDiscountedValue($cartTotal),
        ];


        return redirect()->back()->with(['cartDetails' =>  $this->cartDetails]);
    }
}