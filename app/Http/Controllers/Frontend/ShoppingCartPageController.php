<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\shopping_cart\ShoppingCart;
use App\Services\Frontend\Pages\ShoppingCartPageService;
use Inertia\Inertia;

class ShoppingCartPageController extends Controller
{
    public $cartPageService;
    public $products;
    public $outOfStockProducts;
    public $cartSubTotal;
    public $cartTotal;
    public $shipmentFees;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->cartPageService = new ShoppingCartPageService();
            $this->products =  $this->cartPageService->getUserShoppingCart();
            $this->outOfStockProducts = $this->cartPageService->getOutOfStockProducts();
            $this->shipmentFees =  $this->cartPageService->getShipmentFees();
            $this->cartSubTotal = $this->cartPageService->getCartSubTotal();
            $this->cartTotal = $this->cartPageService->getCartTotal();

            return $next($request);
        });
    }
    public function index()
    {

        return Inertia::render(
            'ShoppingCartPage/Index',
            [
                'cartCounter' => count($this->products),
                'products' => $this->products,
                'shipmentFees' => $this->shipmentFees,
                'cartSubTotal' => $this->cartSubTotal,
                'cartTotal' => $this->cartTotal,
                'outOfStockProducts' => $this->outOfStockProducts,
                'outOfStockProductsCounter' => count($this->outOfStockProducts),
            ]
        );
    }
    public function increaseProductQuantity($cartItemId)
    {

        $cartItem =  $this->products->where('cart_id', $cartItemId)->first();

        if (is_null($cartItem) || $cartItem['quantity'] > $cartItem['stock_size']) {
            return;
        }

        $cartItem['quantity'] += 1;

        $shoppingCart = auth()->user()->shoppingCart()->wherePivot('id', $cartItemId)->first();
        $shoppingCart->pivot->quantity = $cartItem['quantity'];
        $shoppingCart->pivot->save();
    }
    public function decreaseProductQuantity($cartItemId)
    {

        $cartItem =  $this->products->where('cart_id', $cartItemId)->first();

        if (is_null($cartItem) || $cartItem['quantity'] == 1) {
            return;
        }

        $cartItem['quantity'] -= 1;

        $shoppingCart = auth()->user()->shoppingCart()->wherePivot('id', $cartItemId)->first();
        $shoppingCart->pivot->quantity = $cartItem['quantity'];
        $shoppingCart->pivot->save();
    }
    public function removeCartItem($cartItemId)
    {

        ShoppingCart::query()
            ->where(['user_id' => auth()->id(), 'id' =>  $cartItemId])
            ->delete();
    }

    public function saveProductforLater($productId, $cartItemId)
    {

        if (!auth()->user()->wishlistHas($productId)) {

            auth()->user()->wishlist()->attach($productId);
        }

        ShoppingCart::where(['user_id' => auth()->id(), 'id' => $cartItemId])->delete();
    }
    public function saveOutOfStockforLater()
    {

        $productIds = $this->outOfStockProducts->pluck('product_id');
        $cartIds = $this->outOfStockProducts->pluck('cart_id');


        if (!auth()->user()->wishlistHasProducts($productIds)) {

            auth()->user()->wishlist()->attach($productIds);
        }

        ShoppingCart::query()
            ->where('user_id', auth()->id())
            ->whereIn('id', $cartIds)
            ->delete();
    }
}