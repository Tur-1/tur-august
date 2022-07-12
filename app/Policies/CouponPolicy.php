<?php

namespace App\Policies;

use App\Models\user\User;
use App\Models\Coupon\Coupon;
use App\Actions\Backend\UserCanAccessAction;
use Illuminate\Auth\Access\HandlesAuthorization;

class CouponPolicy
{
    use HandlesAuthorization;
    private $userCanAccessAction;

    public function __construct(UserCanAccessAction $userCanAccessAction)
    {
        $this->userCanAccessAction = $userCanAccessAction;
    }
    public function viewAny(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('access-coupons');
    }

    public function view(User $user, Coupon $coupon)
    {
        return $this->userCanAccessAction->userCanAccess('view-coupons');
    }

    public function create(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('create-coupons');
    }

    public function update(User $user, Coupon $coupon)
    {

        return $this->userCanAccessAction->userCanAccess('update-coupons');
    }

    public function delete(User $user, Coupon $coupon)
    {


        return $this->userCanAccessAction->userCanAccess('delete-coupons');
    }

    public function restore(User $user, Coupon $coupon)
    {
        //
    }


    public function forceDelete(User $user, Coupon $coupon)
    {
        //
    }
}