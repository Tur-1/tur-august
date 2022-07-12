<?php

namespace App\Policies;

use App\Models\user\User;
use App\Actions\Backend\UserCanAccessAction;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    private $userCanAccessAction;

    public function __construct(UserCanAccessAction $userCanAccessAction)
    {
        $this->userCanAccessAction = $userCanAccessAction;
    }
    public function viewAny(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('access-users');
    }

    public function view(User $user, User $model)
    {
        return $this->userCanAccessAction->userCanAccess('view-users');
    }

    public function create(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('create-users');
    }

    public function update(User $user, User $model)
    {

        return $this->userCanAccessAction->userCanAccess('update-users');
    }
    public function accessCustomers()
    {

        return $this->userCanAccessAction->userCanAccess('access-customers');
    }
    public function delete(User $user, User $model)
    {

        return $this->userCanAccessAction->userCanAccess('delete-users');
    }
    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\user\User  $user
     * @param  \App\Models\user\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\user\User  $user
     * @param  \App\Models\user\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}