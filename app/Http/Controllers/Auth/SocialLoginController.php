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

    public function github()
    {
        return Socialite::driver('github')->redirect();
    }
    public function githubRedirect()
    {
        $githubUser = Socialite::driver('github')->user();

        $this->socialLoginService->SignIn($githubUser);
        session()->flash('requireAuth', ['status' => false, 'time' => time()]);
        return redirect(route('homePage'));
    }
    public function google()
    {

        return Socialite::driver('google')->redirect();
    }
    public function googleRedirect()
    {
        $googleUser = Socialite::driver('google')->user();

        $this->socialLoginService->SignIn($googleUser);
        session()->flash('requireAuth', ['status' => false, 'time' => time()]);

        return redirect(route('homePage'));
    }
}