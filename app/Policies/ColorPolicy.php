<?php

namespace App\Policies;

use App\Models\user\User;
use App\Models\product\Color;
use App\Actions\Backend\UserCanAccessAction;
use Illuminate\Auth\Access\HandlesAuthorization;

class ColorPolicy
{
    use HandlesAuthorization;
    private $userCanAccessAction;

    public function __construct(UserCanAccessAction $userCanAccessAction)
    {
        $this->userCanAccessAction = $userCanAccessAction;
    }
    public function viewAny(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('access-colors');
    }

    public function view(User $user, Color $color)
    {
        return $this->userCanAccessAction->userCanAccess('view-colors');
    }

    public function create(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('create-colors');
    }

    public function update(User $user, Color $color)
    {

        return $this->userCanAccessAction->userCanAccess('update-colors');
    }

    public function delete(User $user, Color $color)
    {


        return $this->userCanAccessAction->userCanAccess('delete-colors');
    }

    public function restore(User $user, Color $color)
    {
        //
    }

    public function forceDelete(User $user, Color $color)
    {
        //
    }
}