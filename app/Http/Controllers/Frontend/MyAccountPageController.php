<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyAccountPageController extends Controller
{
    public function index()
    {
        return Inertia::render('Frontend/MyAccountPage/Index');
    }
}