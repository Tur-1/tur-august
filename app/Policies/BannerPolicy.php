<?php

namespace App\Policies;

use App\Models\user\User;
use App\Models\Banner\Banner;
use App\Actions\Backend\UserCanAccessAction;
use Illuminate\Auth\Access\HandlesAuthorization;

class BannerPolicy
{
    use HandlesAuthorization;

    private $userCanAccessAction;

    public function __construct(UserCanAccessAction $userCanAccessAction)
    {
        $this->userCanAccessAction = $userCanAccessAction;
    }
    public function viewAny(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('access-banners');
    }

    public function view(User $user, Banner $banner)
    {
        return $this->userCanAccessAction->userCanAccess('view-banners');
    }

    public function create(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('create-banners');
    }

    public function update(User $user, Banner $banner)
    {

        return $this->userCanAccessAction->userCanAccess('update-banners');
    }

    public function delete(User $user, Banner $banner)
    {

        return $this->userCanAccessAction->userCanAccess('delete-banners');
    }
    public function restore(User $user, Banner $banner)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\users\User  $user
     * @param  \App\Models\sections\Banner  $banner
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Banner $banner)
    {
        //
    }
}