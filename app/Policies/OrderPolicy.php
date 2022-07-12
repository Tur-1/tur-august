<?php

namespace App\Policies;

use App\Models\user\User;
use App\Models\order\Order;
use App\Actions\Backend\UserCanAccessAction;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;
    private $userCanAccessAction;

    public function __construct(UserCanAccessAction $userCanAccessAction)
    {
        $this->userCanAccessAction = $userCanAccessAction;
    }
    public function viewAny(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('access-orders');
    }

    public function view(User $user, Order $order)
    {
        return $this->userCanAccessAction->userCanAccess('view-orders');
    }

    public function create(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('create-orders');
    }

    public function update(User $user, Order $order)
    {

        return $this->userCanAccessAction->userCanAccess('update-orders');
    }

    public function delete(User $user, Order $order)
    {


        return $this->userCanAccessAction->userCanAccess('delete-orders');
    }
    public function restore(User $user, Order $order)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\users\User  $user
     * @param  \App\Models\orders\Order  $order
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Order $order)
    {
        //
    }
}