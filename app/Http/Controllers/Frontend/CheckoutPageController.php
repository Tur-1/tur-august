<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutPageController extends Controller
{
    public function index()
    {
        return Inertia::render('Frontend/CheckoutPage/Index');
    }
}