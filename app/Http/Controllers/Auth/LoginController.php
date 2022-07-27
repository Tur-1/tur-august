<?php

namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Modules\Frontend\Wishlist\Services\WishlistPageService;
use App\Modules\Frontend\ShoppingCart\Services\ShoppingCartPageService;
use App\Modules\Frontend\ProductDetail\Services\ProductDetailPageService;
use App\Traits\RedirectWithMessageTrait;

class LoginController extends Controller
{
    use RedirectWithMessageTrait;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    protected function authenticated(Request $request, $user)
    {
        session()->flash('requireAuth', ['status' => false, 'time' => time()]);


        if (Session::exists('wishlist')) {
            (new WishlistPageService())->attachProductToWishlist();

            return redirect()->back();
        }

        if (Session::exists('productDetail')) {
            (new ShoppingCartPageService())->attachProductToShoppingCart();
            return $this->redirectBackWithSuccessMsg('The product was added to your cart!');
        }
        if (Session::exists('productReview')) {

            $productReview = Session::get('productReview');

            (new ProductDetailPageService())->createComment($productReview['product_id'], $productReview['comment']);

            Session::remove('productReview');
            return $this->redirectBackWithSuccessMsg('Your comment has been added successfully');
        }
    }
}