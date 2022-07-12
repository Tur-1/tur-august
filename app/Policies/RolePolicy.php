<?php

namespace App\Policies;

use App\Models\user\Role;
use App\Models\user\User;
use App\Actions\Backend\UserCanAccessAction;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;


    private $userCanAccessAction;

    public function __construct(UserCanAccessAction $userCanAccessAction)
    {
        $this->userCanAccessAction = $userCanAccessAction;
    }
    public function viewAny(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('access-roles');
    }

    public function view(User $user, Role $role)
    {
        return $this->userCanAccessAction->userCanAccess('view-roles');
    }

    public function create(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('create-roles');
    }

    public function update(User $user, Role $role)
    {

        return $this->userCanAccessAction->userCanAccess('update-roles');
    }

    public function delete(User $user, Role $role)
    {

        return $this->userCanAccessAction->userCanAccess('delete-roles');
    }

    public function restore(User $user, Role $role)
    {
        //
    }

    public function forceDelete(User $user, Role $role)
    {
        //
    }
}