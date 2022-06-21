<?php

namespace App\Http\Controllers\Frontend;

use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\AlertMessages;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class MyAccountPageController extends Controller
{
    use AlertMessages;
    public $genders = ['Female', 'Male'];
    public function index()
    {
        $user = auth()->user();

        return Inertia::render('Frontend/MyAccountPage/Index', ['user' => $user, 'genders' => $this->genders]);
    }
    public function updateAccountInformation(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->id())],
            'gender' => 'required|in:Female,Male'
        ]);

        auth()->user()->update(
            [
                'name' =>  Str::title($request->name),
                'email' => $request->email,
                'gender' => $request->gender,
            ]
        );

        return $this->RedirectBackWithSuccessMsg('account information has ben updated successfully');
    }
    public function updateAccountPhoneNumber(Request $request)
    {

        $request->validate(['phone_number' => 'required|digits_between:10,20|numeric']);

        auth()->user()->update(['phone_number' => intval($request->phone_number)]);

        return $this->RedirectBackWithSuccessMsg('phone number has been updated successfully');
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

        return $this->RedirectBackWithSuccessMsg('your password has been updated successfully');
    }
}