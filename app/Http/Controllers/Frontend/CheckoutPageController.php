<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Exceptions\InValidCouponCodeException;
use App\Models\user\Services\UserAddressService;
use App\Services\Frontend\Pages\ShoppingCartPageService;
use App\Services\Frontend\Pages\CheckoutPage\CouponService;

class CheckoutPageController extends Controller
{

    public $cartPageService;
    public $userAddressService;
    public $userAddresses;
    public $products;
    public $addres_id = null;
    public $cartTotal;
    public $cartDetails = [];

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->userAddressService = new UserAddressService();
            $this->cartPageService = new ShoppingCartPageService();

            $this->products =  $this->cartPageService->getUserShoppingCart();
            $this->userAddresses  = $this->userAddressService->getUserAddresses();

            $this->cartDetails = [
                'shipmentFees' =>  $this->cartPageService->getShipmentFees(),
                'cartSubTotal' =>  $this->cartPageService->getCartSubTotal(),
                'cartTotal' =>   $this->cartPageService->getCartTotal(),
                'coupon' => null
            ];

            $cartTotalWithCoupon = Session::get('cartTotalWithCoupon');

            if (!is_null($cartTotalWithCoupon)) {

                $this->cartDetails['cartTotal'] =  $cartTotalWithCoupon['cartTotal'];
                $this->cartDetails['coupon'] =   $cartTotalWithCoupon['coupon'];
            }
            return $next($request);
        });
    }
    public function index()
    {


        return Inertia::render('CheckoutPage/Index', [
            'products' => $this->products,
            'cartDetails' => $this->cartDetails,
            'userAddresses' =>  $this->userAddresses,
        ]);
    }

    public function applyCoupon(Request $request, CouponService $couponService)
    {
        $request->validate(['code' => 'required|string']);


        $cartTotalWithCoupon = Session::get('cartTotalWithCoupon');

        if (!is_null($cartTotalWithCoupon)) {

            Session::remove('cartTotalWithCoupon');
            return redirect()->back();
        }



        try {
            $couponService->getCoupon($request->code);
        } catch (InValidCouponCodeException $ex) {
            return redirect()->back()->withErrors(['code' => $ex->getMessage()]);
        }

        $couponService->putCartTotalAndCouponInSession($this->cartDetails['cartTotal']);

        return redirect()->back();
    }

    public function buyNow(Request $request)
    {

        dd($request->all(), $this->cartDetails);
    }
}