<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SocialLoginService;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Services\StoreProductToShoppingCartService;
use App\Traits\AlertMessages;
use App\Traits\RedirectWithMessageTrait;

class SocialLoginController extends Controller
{
    use RedirectWithMessageTrait;
    private $socialLoginService;


    public function __construct()
    {
        $this->socialLoginService = new SocialLoginService();
    }

    public function github()
    {

        Session::put('intendedUrl', redirect()->intended()->getTargetUrl());
        return Socialite::driver('github')->redirect();
    }
    public function githubRedirect()
    {
        $githubUser = Socialite::driver('github')->user();


        $this->socialLoginService->signIn($githubUser);


        return $this->socialLoginService->authenticated();
    }
    public function google()
    {
        Session::put('intendedUrl', redirect()->intended()->getTargetUrl());
        return Socialite::driver('google')->redirect();
    }
    public function googleRedirect()
    {
        $googleUser = Socialite::driver('google')->user();


        $this->socialLoginService->signIn($googleUser);


        return $this->socialLoginService->authenticated();
    }

    public function __destruct()
    {
        Session::remove('intendedUrl');
    }
}