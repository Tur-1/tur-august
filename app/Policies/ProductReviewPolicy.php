<?php

namespace App\Policies;

use App\Models\user\User;
use App\Models\product\ProductReview;
use App\Actions\Backend\UserCanAccessAction;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductReviewPolicy
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

    public function view(User $user, ProductReview $productreview)
    {
        return $this->userCanAccessAction->userCanAccess('view-products');
    }

    public function create(User $user)
    {

        return $this->userCanAccessAction->userCanAccess('create-products');
    }

    public function update(User $user, ProductReview $productreview)
    {

        return $this->userCanAccessAction->userCanAccess('update-products');
    }

    public function delete(User $user, ProductReview $productreview)
    {

        return $this->userCanAccessAction->userCanAccess('delete-products');
    }
    public function restore(User $user, ProductReview $productreview)
    {
        //
    }


    public function forceDelete(User $user, ProductReview $productreview)
    {
        //
    }
}