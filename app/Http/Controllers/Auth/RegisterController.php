<?php

namespace App\Http\Controllers\Auth;

use App\Mail\WelcomeMail;
use App\Models\user\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use App\Modules\Frontend\Wishlist\Services\WishlistPageService;
use App\Modules\Frontend\ShoppingCart\Services\ShoppingCartPageService;
use App\Modules\Frontend\ProductDetail\Services\ProductDetailPageService;
use App\Traits\RedirectWithMessageTrait;

class RegisterController extends Controller
{
    use RedirectWithMessageTrait;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'register_name' => ['required', 'string', 'max:255', 'min:5'],
            'register_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'register_password' => 'required_with:password_confirmation|same:password_confirmation|min:4',
            'gender' => 'required|in:Female,Male'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['register_name'],
            'email' => $data['register_email'],
            'password' => $data['register_password'],
            'gender' => $data['gender']

        ]);

        return $user;
    }

    protected function registered(Request $request, $user)
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