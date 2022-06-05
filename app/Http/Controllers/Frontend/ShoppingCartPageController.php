<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ShoppingCartPageController extends Controller
{
    public function index()
    {

        $shoppingCartItems =  auth()->user()->shoppingCart;

        return Inertia::render('Frontend/ShoppingCartPage/Index', compact('shoppingCartItems'));
    }

    public function addToShoppingCart(Request $request)
    {
    }
}