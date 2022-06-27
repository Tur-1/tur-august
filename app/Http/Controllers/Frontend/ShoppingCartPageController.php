<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\shopping_cart\ShoppingCart;
use App\Models\User;
use App\Services\Frontend\Pages\ShoppingCartPageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class ShoppingCartPageController extends Controller
{
    public $products = [];
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->products =  (new ShoppingCartPageService)->getUserShoppingCart();

            return $next($request);
        });
    }
    public function index()
    {


        return Inertia::render(
            'ShoppingCartPage/Index',
            [
                'cartCounter' => count($this->products),
                'products' => $this->products
            ]
        );
    }
    public function increaseProductQuantity($cartItemId)
    {

        $cartItem =  collect($this->products)->where('cart_id', $cartItemId)->first();

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

        $cartItem =  collect($this->products)->where('cart_id', $cartItemId)->first();

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
    public function addToShoppingCart(Request $request)
    {

        if (!auth()->user()->shoppingCartHas($request->product_id, $request->size_id)) {

            auth()->user()->shoppingCart()->attach($request->product_id, ['size_id' => $request->size_id, 'quantity' => 1]);
        }


        $message = 'The product was added to your cart!';
    }
    public function saveProductforLater($productId)
    {
        auth()->user()->wishlist()->attach($productId);

        auth()->user()->shoppingCart()->detach($productId);
    }
}