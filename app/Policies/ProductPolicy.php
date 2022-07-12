<?php

namespace App\Policies;

use App\Models\user\User;
use App\Models\product\Product;
use App\Actions\Backend\UserCanAccessAction;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;
    private $userCanAccessAction;

    public function __construct(UserCanAccessAction $userCanAccessAction)
    {
        $this->userCanAccessAction = $userCanAccessAction;
    }
    public function viewAny(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('access-products');
    }

    public function view(User $user, Product $product)
    {
        return $this->userCanAccessAction->userCanAccess('view-products');
    }

    public function create(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('create-products');
    }

    public function update(User $user, Product $product)
    {

        return $this->userCanAccessAction->userCanAccess('update-products');
    }

    public function delete(User $user, Product $product)
    {


        return $this->userCanAccessAction->userCanAccess('delete-products');
    }

    public function restore(User $user, Product $product)
    {
        //
    }

    public function forceDelete(User $user, Product $product)
    {
        //
    }
}