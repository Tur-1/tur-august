<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Traits\RedirectWithMessageTrait;
use App\Models\user\Services\UserAddressService;
use App\Services\Frontend\Pages\MyAccountPageService;
use App\Http\Requests\Frontend\StoreUserAddressRequest;
use App\Http\Requests\Frontend\StoreUserAccountInformationRequest;


class MyAccountPageController extends Controller
{
    use RedirectWithMessageTrait;
    public $genders = ['Female', 'Male'];
    private $userAddressService;
    private $myAccountService;

    public function __construct()
    {
        $this->userAddressService =  new UserAddressService();
        $this->myAccountService =  new MyAccountPageService();
    }

    public function index()
    {
        $user = $this->myAccountService->getAuthenticatedUser();
        $orders = $this->myAccountService->getUserOrders();

        $userAddresses = $this->userAddressService->getUserAddresses();

        return Inertia::render('MyAccountPage/Index', [
            'user' => $user,
            'genders' => $this->genders,
            'userAddresses' => $userAddresses,
            'orders' => $orders

        ]);
    }
    public function orderPage($orderId)
    {
        $order = $this->myAccountService->findUserOrder($orderId);
        $products = $this->myAccountService->getOrderProducts();

        $address = $this->myAccountService->getOrderAddress();

        return Inertia::render('MyAccountPage/components/MyOrders/OrderPage/Index', [
            'order' => $order,
            'products' => $products,
            'address' => $address,
        ]);
    }
    public function updateAccountInformation(StoreUserAccountInformationRequest $request)
    {

        $this->myAccountService->updateAccountInfo($request->validated());

        return $this->redirectBackWithSuccessMsg('account information has ben updated successfully');
    }
    public function updateAccountPhoneNumber(Request $request)
    {

        $request->validate(['phone_number' => 'required|digits_between:10,20|numeric']);


        $this->myAccountService->updatePhoneNumber($request->phone_number);

        return $this->redirectBackWithSuccessMsg('phone number has been updated successfully');
    }

    public function updateAccountPassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    $fail('current password does not match.');
                }
            }],
            'new_password' => 'required|string|min:1|same:new_password_confirmation|different:current_password',
            'new_password_confirmation' => 'required',
        ]);

        $this->myAccountService->updatePassword($request->new_password);

        return $this->redirectBackWithSuccessMsg('your password has been updated successfully');
    }


    public function storeNewAddress(StoreUserAddressRequest $request)
    {

        $this->userAddressService->createAddress($request->validated());

        return $this->redirectBackWithSuccessMsg('new address has been added successfully');
    }

    public function updateUserAddress(StoreUserAddressRequest $request,  $id)
    {
        $address = $this->userAddressService->findUserAddress($id);

        $address->update($request->validated());

        return $this->redirectBackWithSuccessMsg(' address has been updated successfully');
    }
    public function destroyUserAddress($id)
    {
        $address = $this->userAddressService->findUserAddress($id);

        $address->delete();

        return $this->redirectBackWithSuccessMsg('address has been deleted successfully');
    }
}