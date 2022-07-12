<?php

namespace App\Policies;

use App\Models\user\User;
use App\Models\product\Brand;
use App\Actions\Backend\UserCanAccessAction;
use Illuminate\Auth\Access\HandlesAuthorization;

class BrandPolicy
{
    use HandlesAuthorization;

    private $userCanAccessAction;

    public function __construct(UserCanAccessAction $userCanAccessAction)
    {
        $this->userCanAccessAction = $userCanAccessAction;
    }
    public function viewAny(User $user)
    {
        return $this->userCanAccessAction->userCanAccess('access-brands');
    }

    public function view(User $user, Brand $brand)
    {
        return $this->userCanAccessAction->userCanAccess('view-brands');
    }

    public function create(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('create-brands');
    }

    public function update(User $user, Brand $brand)
    {

        return $this->userCanAccessAction->userCanAccess('update-brands');
    }

    public function delete(User $user, Brand $brand)
    {


        return $this->userCanAccessAction->userCanAccess('delete-brands');
    }

    public function restore(User $user, Brand $brand)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\user\User  $user
     * @param  \App\Models\product\Brand  $brand
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Brand $brand)
    {
        //
    }
}