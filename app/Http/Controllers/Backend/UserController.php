<?php

namespace App\Http\Controllers\Backend;

use App\Models\user\User;
use Illuminate\Http\Request;
use App\Traits\RedirectWithMessageTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreUserRequest;

class UserController extends Controller
{
    use RedirectWithMessageTrait;

    private $routeName = 'admin.users.index';
    public $gender = ['Female', 'Male'];

    public function index()
    {
        $users = User::get();

        return view('Backend.pages.users.users-page', compact('users'));
    }
    public function customers()
    {
        $users = User::get();
        return view('Backend.pages.users.users-page', compact('users'));
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
        return view('Backend.pages.users.create-edit-user-page', ['gender' => $this->gender, 'user' => $user]);
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
        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }
}
