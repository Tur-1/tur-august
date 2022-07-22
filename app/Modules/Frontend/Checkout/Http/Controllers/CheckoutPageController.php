<?php

namespace App\Modules\Frontend\Checkout\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Traits\RedirectWithMessageTrait;
use App\Models\user\Services\UserAddressService;

use App\Modules\Frontend\Checkout\Services\CheckoutPageService;
use App\Modules\Frontend\Checkout\Services\CheckoutCouponService;
use App\Modules\Frontend\ShoppingCart\Services\ShoppingCartPageService;
use App\Modules\Frontend\Checkout\Exceptions\InValidCouponCodeException;
use App\Modules\Frontend\Checkout\Exceptions\ProductNoLongerInStockException;
use Illuminate\Support\Facades\Route;

class CheckoutPageController extends Controller
{

    use RedirectWithMessageTrait;

    public $userAddressService;
    private $coupon;
    private $order;

    public function __construct(UserAddressService $userAddressService)
    {
        $this->middleware(function ($request, $next) use ($userAddressService) {
            $this->userAddressService = $userAddressService;


            $this->userAddresses  = $this->userAddressService->getUserAddresses();

            return $next($request);
        });
    }
    public function index(ShoppingCartPageService $cartPageService)
    {

        $products =  $cartPageService->getUserShoppingCart();
        $outOfStockProducts = $cartPageService->getOutOfStockProducts();
        $cartDetails = $cartPageService->getShoppingCartDetails();


        return Inertia::render('CheckoutPage/Index', [
            'products' => $products,
            'cartCounter' => count($products),
            'outOfStockProducts' => $outOfStockProducts,
            'outOfStockProductsCounter' => count($outOfStockProducts),
            'cartDetails' => $cartDetails,
            'userAddresses' =>  $this->userAddresses,
        ]);
    }

    public function applyCoupon(Request $request, CheckoutCouponService $couponService, ShoppingCartPageService $cartPageService)
    {
        $request->validate(['code' => 'required|string']);

        if (!is_null(Session::get('cartDetailsWithCoupon'))) {

            Session::remove('cartDetailsWithCoupon');
            return redirect()->back();
        }
        $cartPageService->getUserShoppingCart();
        $cartDetails = $cartPageService->getShoppingCartDetails();

        try {
            $couponService->getCoupon($request->code);
        } catch (InValidCouponCodeException $ex) {
            return redirect()->back()->withErrors(['code' => $ex->getMessage()]);
        }


        $cartTotalWithCoupon = $couponService->getCartTotalWithCoupon($cartDetails['cartTotal']);
        $cartDetails['cartTotal'] =   $cartTotalWithCoupon['cartTotal'];
        $cartDetails['coupon'] =   $cartTotalWithCoupon['coupon'];


        Session::put('cartDetailsWithCoupon', $cartDetails);

        return redirect()->back();
    }

    public function buyNow(Request $request)
    {

        $cartDetails = Session::get('cartDetails');
        $cartDetailsWithCoupon = Session::get('cartDetailsWithCoupon');



        $userAddress = $this->userAddressService->findUserAddress($request->address_id);

        if ($this->userAddressService->isNotInUserAddresses($request->address_id)) {
            return $this->redirectBackWithErrorMsg('please select an address !');
        }

        if (!is_null($cartDetailsWithCoupon)) {
            $cartDetails = $cartDetailsWithCoupon;
            try {
                $this->coupon =  (new CheckoutCouponService())->getCoupon($cartDetails['coupon']['code']);
            } catch (InValidCouponCodeException $ex) {

                Session::remove('cartDetailsWithCoupon');
                return redirect()->back()->withErrors(['code' => $ex->getMessage()]);
            }
        }




        try {

            $checkoutPageService = new CheckoutPageService($cartDetails, $userAddress, $this->coupon);

            DB::transaction(function () use ($checkoutPageService) {
                $this->order = $checkoutPageService->createNewOrder();

                $checkoutPageService->checkProductsStock();
            });

            $checkoutPageService->storeOrderProducts();

            $checkoutPageService->decreaseStockSize();

            $checkoutPageService->updateProductStock();

            $checkoutPageService->createOrderAddress($this->order->id);

            $checkoutPageService->storeOrderCoupon($this->order->id);

            (new CheckoutCouponService())->increaseCouponUsedTimes($this->coupon);

            $checkoutPageService->notifyUserOfOrderAcceptance();
        } catch (ProductNoLongerInStockException $ex) {


            return $this->redirectBackWithErrorMsg($ex->getMessage());
        }


        (new ShoppingCartPageService())->deleteUserCartProducts();

        Session::forget(['cartDetailsWithCoupon', 'cartDetails']);

        $message = 'Your order number #' . $this->order->id . ' has been received successfully';

        return $this->redirectWithSuccessMsg('homePage', $message);
    }
}