<?php

namespace App\Modules\Home\Http\Controllers;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{


    public function index()
    {


        return Inertia::render('HomePage/Index');
    }
}