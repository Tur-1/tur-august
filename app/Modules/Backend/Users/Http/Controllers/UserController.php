<?php

namespace App\Modules\Backend\Users\Http\Controllers;

use App\Models\user\User;
use App\Http\Controllers\Controller;
use App\Traits\RedirectWithMessageTrait;
use App\Modules\Backend\Users\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    use RedirectWithMessageTrait;

    private $routeName = 'admin.users.index';
    public $gender = ['Female', 'Male'];

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index()
    {
        $users = User::query()->with('role')->NotCustomers()->get();

        return view('Backend.pages.users.users-page', compact('users'));
    }
    public function customers()
    {
        $this->authorize('access-customers', User::class);
        $users = User::query()->Customers()->get();
        return view('Backend.pages.customers.customers-page', compact('users'));
    }

    public function create()
    {

        return view('Backend.pages.users.create-edit-user-page', ['gender' => $this->gender]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request, User $user)
    {
        $userRequest = $request->validated();

        $user = $user->create($userRequest);
        $user->permissions()->sync($request->permissions);
        $message = $user->name . 'has been Added successfully';

        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user->load(['permissions', 'orders' => fn ($order) => $order->with('status:id,name')->withCount('products')]);
        $permissionsIds =  $user->permissions->pluck('id')->toArray();


        return view('Backend.pages.users.create-edit-user-page', ['gender' => $this->gender, 'user' => $user, 'permissionsIds' => $permissionsIds]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, User $user)
    {

        $userRequest = $request->validated();

        $user->update($userRequest);
        $user->permissions()->sync($request->permissions);
        $message = $user->name . ' has been Updated successfully';

        return $this->redirectBackWithSuccessMsg($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $message = $user->name . ' has been Deleted successfully';

        $user->delete();

        if (url()->previous() == 'https://tur-august.herokuapp.com/admin/customers') {
            return $this->redirectWithSuccessMsg('admin.customers', $message);
        }
        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }
}