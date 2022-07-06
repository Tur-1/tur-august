<?php

namespace App\Modules\Checkout\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Traits\RedirectWithMessageTrait;
use App\Exceptions\InValidCouponCodeException;
use App\Models\user\Services\UserAddressService;

use App\Modules\Checkout\Services\CheckoutPageService;
use App\Modules\Checkout\Services\CheckoutCouponService;
use App\Modules\ShoppingCart\Services\ShoppingCartPageService;
use App\Exceptions\ProductNoLongerInStockException;

class CheckoutPageController extends Controller
{

    use RedirectWithMessageTrait;
    public $cartPageService;
    public $outOfStockProducts;
    public $userAddressService;
    public $userAddresses;
    public $products;
    private $order;
    private $coupon;
    public $addres_id = null;
    public $cartTotal;
    public $cartDetails = [];

    public function __construct(UserAddressService $userAddressService, ShoppingCartPageService $cartPageService)
    {
        $this->middleware(function ($request, $next) use ($userAddressService, $cartPageService) {
            $this->userAddressService = $userAddressService;
            $this->cartPageService = $cartPageService;

            $this->products =  $this->cartPageService->getUserShoppingCart();
            $this->userAddresses  = $this->userAddressService->getUserAddresses();
            $this->outOfStockProducts = $this->cartPageService->getOutOfStockProducts();

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
            'outOfStockProducts' => $this->outOfStockProducts,
            'outOfStockProductsCounter' => count($this->outOfStockProducts),
        ]);
    }

    public function applyCoupon(Request $request, CheckoutCouponService $couponService)
    {
        $request->validate(['code' => 'required|string']);


        $cartTotalWithCoupon = Session::get('cartTotalWithCoupon');

        if (!is_null($cartTotalWithCoupon)) {

            Session::forget(['cartTotalWithCoupon', 'couponCode']);

            return redirect()->back();
        }

        try {
            $couponService->getCoupon($request->code);
        } catch (InValidCouponCodeException $ex) {
            return redirect()->back()->withErrors(['code' => $ex->getMessage()]);
        }

        Session::put('couponCode', $request->code);

        $couponService->putCartTotalAndCouponInSession($this->cartDetails['cartTotal']);


        return redirect()->back();
    }

    public function buyNow(Request $request)
    {


        $userAddress = $this->userAddressService->findUserAddress($request->address_id);

        if ($this->userAddressService->isNotInUserAddresses($request->address_id)) {
            return $this->redirectBackWithErrorMsg('please select an address !');
        }

        if (Session::exists('couponCode')) {

            try {
                $this->coupon =  (new CheckoutCouponService())->getCoupon(Session::get('couponCode'));
            } catch (InValidCouponCodeException $ex) {
                Session::forget(['cartTotalWithCoupon', 'couponCode']);
                return redirect()->back()->withErrors(['code' => $ex->getMessage()]);
            }
        }


        try {

            $checkoutPageService = new CheckoutPageService($this->cartDetails, $userAddress);

            DB::transaction(function () use ($checkoutPageService) {
                $this->order = $checkoutPageService->createNewOrder();

                $checkoutPageService->checkProductsStock();
            });

            $checkoutPageService->storeOrderProducts();

            $checkoutPageService->decreaseStockSize();

            $checkoutPageService->updateProductStock();

            $checkoutPageService->createOrderAddress($this->order->id);

            (new CheckoutCouponService())->increaseCouponUsedTimes($this->coupon);
        } catch (ProductNoLongerInStockException $ex) {
            return $this->redirectBackWithErrorMsg('product No Longer In Stock  !');
        }


        $this->cartPageService->deleteUserCartProducts();

        $message = 'Your order number #' . $this->order->id . ' has been received successfully';

        return $this->redirectWithSuccessMsg('homePage', $message);
    }
}