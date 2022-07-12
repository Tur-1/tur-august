<?php

namespace App\Policies;

use App\Models\user\User;
use App\Models\order\OrderStatus;
use App\Actions\Backend\UserCanAccessAction;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderStatusPolicy
{
    use HandlesAuthorization;
    private $userCanAccessAction;

    public function __construct(UserCanAccessAction $userCanAccessAction)
    {
        $this->userCanAccessAction = $userCanAccessAction;
    }
    public function viewAny(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('access-orders-status');
    }

    public function view(User $user, OrderStatus $orderStatus)
    {
        return $this->userCanAccessAction->userCanAccess('view-orders-status');
    }

    public function create(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('create-orders-status');
    }

    public function update(User $user, OrderStatus $orderStatus)
    {

        return $this->userCanAccessAction->userCanAccess('update-orders-status');
    }

    public function delete(User $user, OrderStatus $orderStatus)
    {


        return $this->userCanAccessAction->userCanAccess('delete-orders-status');
    }
    public function restore(User $user, OrderStatus $orderStatus)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\users\User  $user
     * @param  \App\Models\orders\OrderStatus  $orderStatus
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, OrderStatus $orderStatus)
    {
        //
    }
}