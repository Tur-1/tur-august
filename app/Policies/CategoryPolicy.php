<?php

namespace App\Policies;

use App\Models\user\User;
use App\Models\product\Category;
use App\Actions\Backend\UserCanAccessAction;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;
    private $userCanAccessAction;

    public function __construct(UserCanAccessAction $userCanAccessAction)
    {
        $this->userCanAccessAction = $userCanAccessAction;
    }

    public function viewAny(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('access-categories');
    }

    public function view(User $user, Category $Category)
    {
        return $this->userCanAccessAction->userCanAccess('view-categories');
    }

    public function create(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('create-categories');
    }

    public function update(User $user, Category $Category)
    {

        return $this->userCanAccessAction->userCanAccess('update-categories');
    }

    public function delete(User $user, Category $Category)
    {


        return $this->userCanAccessAction->userCanAccess('delete-categories');
    }
    public function restore(User $user, Category $Category)
    {
        //
    }

    public function forceDelete(User $user, Category $Category)
    {
        //
    }
}