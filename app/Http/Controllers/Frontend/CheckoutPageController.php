<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon\Services\CouponService;
use App\Exceptions\InValidCouponCodeException;
use App\Models\user\Services\UserAddressService;
use App\Services\Frontend\Pages\ShoppingCartPageService;

class CheckoutPageController extends Controller
{

    public $cartPageService;
    public $userAddressService;
    public $userAddresses;
    public $products;
    public $addres_id = null;
    public $outOfStockProducts;
    public $cartDetails = [];

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->userAddressService = new UserAddressService();
            $this->cartPageService = new ShoppingCartPageService();

            $this->products =  $this->cartPageService->getUserShoppingCart();
            $this->outOfStockProducts = $this->cartPageService->getOutOfStockProducts();

            $this->userAddresses  = $this->userAddressService->getUserAddresses();

            $this->cartDetails = [
                'shipmentFees' =>  $this->cartPageService->getShipmentFees(),
                'cartSubTotal' =>  $this->cartPageService->getCartSubTotal(),
                'cartTotal' =>  $this->cartPageService->getCartTotal(),
            ];


            return $next($request);
        });
    }
    public function index()
    {


        return Inertia::render('CheckoutPage/Index', [
            'cartCounter' => count($this->products),
            'products' => $this->products,
            'cartDetails' => $this->cartDetails,
            'userAddresses' =>  $this->userAddresses,
        ]);
    }

    public function applyCoupon(Request $request, CouponService $couponService)
    {

        $cartTotalWithCoupon = Session::get('cartTotalWithCoupon');

        if (!is_null($cartTotalWithCoupon)) {

            Session::remove('cartTotalWithCoupon');

            return redirect()->back();
        }

        $request->validate(['code' => 'required|string']);
        try {
            $coupon = $couponService->getCoupon($request->code);
        } catch (InValidCouponCodeException $ex) {
            return redirect()->back()->withErrors(['code' => $ex->getMessage()]);
        }


        $cartTotalWithCoupon = [
            'cartTotal' => $couponService->getCartTotal($this->cartDetails['cartTotal']),
            'coupon' => [
                'code' => $coupon->code,
                'discounted_value' =>  $couponService->getDiscountedValue($this->cartDetails['cartTotal']),
                'successMsg' => 'coupon applied',
            ]
        ];

        Session::put('cartTotalWithCoupon',  $cartTotalWithCoupon);
        return redirect()->back();
    }

    public function buyNow(Request $request)
    {
        dd($request->all());
    }
}