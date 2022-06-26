<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Traits\AlertMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\StoreUserAccountInformationRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Frontend\StoreUserAddressRequest;
use App\Services\Frontend\UserAddress\UserAddressService;

class MyAccountPageController extends Controller
{
    use AlertMessages;
    public $genders = ['Female', 'Male'];
    public function index(UserAddressService $userAddressService)
    {
        $user = auth()->user();
        $userAddresses = $userAddressService->getUserAdresses();


        return Inertia::render('MyAccountPage/Index', [
            'user' => $user,
            'genders' => $this->genders,
            'userAddresses' => $userAddresses,

        ]);
    }
    public function updateAccountInformation(StoreUserAccountInformationRequest $request)
    {

        auth()->user()->update($request->validated());

        return $this->redirectBackWithSuccessMsg('account information has ben updated successfully');
    }
    public function updateAccountPhoneNumber(Request $request)
    {

        $request->validate(['phone_number' => 'required|digits_between:10,20|numeric']);

        auth()->user()->update(['phone_number' => intval($request->phone_number)]);

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

        auth()->user()->update(['password' => $request->new_password]);

        return $this->redirectBackWithSuccessMsg('your password has been updated successfully');
    }


    public function storeNewAddress(StoreUserAddressRequest $request, UserAddressService $userAddressService)
    {

        $userAddressService->createAddress($request->validated());

        return $this->redirectBackWithSuccessMsg('new address has been added successfully');
    }

    public function updateUserAddress(StoreUserAddressRequest $request, UserAddressService $userAddressService, $id)
    {
        $address = $userAddressService->findUserAddress($id);

        $address->update($request->validated());

        return $this->redirectBackWithSuccessMsg(' address has been updated successfully');
    }
    public function destroyUserAddress(UserAddressService $userAddressService, $id)
    {
        $address = $userAddressService->findUserAddress($id);

        $address->delete();

        return $this->redirectBackWithSuccessMsg('address has been deleted successfully');
    }
}