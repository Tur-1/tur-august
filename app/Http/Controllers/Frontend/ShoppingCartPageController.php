<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Frontend\Pages\ShoppingCartPageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class ShoppingCartPageController extends Controller
{
    public function index(ShoppingCartPageService $shoppingCartPageService)
    {

        $shoppingCartItems =  $shoppingCartPageService->getUserShoppingCart();

        return Inertia::render('ShoppingCartPage/Index', compact('shoppingCartItems'));
    }

    public function addToShoppingCart(Request $request)
    {

        if (!auth()->user()->shoppingCartHas($request->product_id, $request->size_id)) {

            auth()->user()->shoppingCart()->attach($request->product_id, ['size_id' => $request->size_id, 'quantity' => 1]);
        }


        $message = 'The product was added to your cart!';
    }
}
