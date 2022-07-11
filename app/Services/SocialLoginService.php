<?php

namespace App\Services;

use App\Models\user\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Modules\Frontend\Wishlist\Services\WishlistPageService;
use App\Modules\Frontend\ShoppingCart\Services\ShoppingCartPageService;
use App\Modules\Frontend\ProductDetail\Services\ProductDetailPageService;
use App\Traits\RedirectWithMessageTrait;

class SocialLoginService
{
    use RedirectWithMessageTrait;

    public function signIn($socialUser)
    {
        $userName = $socialUser->getName() ?? $socialUser->getNickname();

        $user = $this->isUserExists($socialUser) ?? $this->registerNewUser($userName, $socialUser->getEmail());

        Auth::login($user, true);
    }

    public function authenticated()
    {
        session()->flash('requireAuth', ['status' => false, 'time' => time()]);

        $intendedUrl = Session::get('intendedUrl');

        $previousPageUrl = Session::get('previousPageUrl');

        if (Session::exists('wishlist')) {
            (new WishlistPageService())->attachProductToWishlist();


            return redirect()->to($previousPageUrl);
        }

        if (Session::exists('productDetail')) {

            (new ShoppingCartPageService())->attachProductToShoppingCart();

            return $this->redirectToUrlWithSuccessMsg($previousPageUrl, 'The product was added to your cart!');
        }

        if (Session::exists('productReview')) {

            $productReview = Session::get('productReview');

            (new ProductDetailPageService())->createComment($productReview['product_id'], $productReview['comment']);

            Session::remove('productReview');
            return $this->redirectToUrlWithSuccessMsg($previousPageUrl, 'Your comment has been added successfully');
        }

        return  redirect()->to($intendedUrl);
    }


    public function isUserExists($socialUser)
    {
        return User::where('email', $socialUser->getEmail())->first();
    }
    public function registerNewUser($userName, $userEmail)
    {

        $user = User::create([
            'name' => $userName,
            'email' => $userEmail,
            'password' => Str::random(24),
        ]);


        return $user;
    }
}