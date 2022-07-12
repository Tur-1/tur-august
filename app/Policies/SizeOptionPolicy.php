<?php

namespace App\Policies;

use App\Models\user\User;
use App\Models\product\SizeOption;
use App\Actions\Backend\UserCanAccessAction;
use Illuminate\Auth\Access\HandlesAuthorization;

class SizeOptionPolicy
{
    use HandlesAuthorization;

    private $userCanAccessAction;

    public function __construct(UserCanAccessAction $userCanAccessAction)
    {
        $this->userCanAccessAction = $userCanAccessAction;
    }
    public function viewAny(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('access-size-options');
    }

    public function view(User $user, SizeOption $sizeOption)
    {
        return $this->userCanAccessAction->userCanAccess('view-size-options');
    }

    public function create(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('create-size-options');
    }

    public function update(User $user, SizeOption $sizeOption)
    {

        return $this->userCanAccessAction->userCanAccess('update-size-options');
    }

    public function delete(User $user, SizeOption $sizeOption)
    {

        return $this->userCanAccessAction->userCanAccess('delete-size-options');
    }

    public function restore(User $user, SizeOption $sizeOption)
    {
        //
    }


    public function forceDelete(User $user, SizeOption $sizeOption)
    {
        //
    }
}