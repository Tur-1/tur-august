<?php

namespace App\Modules\Backend\Roles\Http\Controllers;

use App\Models\user\Role;
use Illuminate\Support\Str;
use App\Models\product\Color;
use App\Models\user\Permission;
use App\Http\Controllers\Controller;
use App\Traits\RedirectWithMessageTrait;
use App\Modules\Backend\Roles\Http\Requests\StoreRoleRequest;

class RoleController extends Controller
{

    use RedirectWithMessageTrait;
    private $routeName = 'admin.roles.index';


    public function index()
    {
        $roles = Role::get();

        return view('Backend.pages.roles.roles-page', compact('roles'));
    }


    public function create()
    {
        $permissions = Permission::query()->get()->groupBy(function ($per) {
            return $per->page_name;
        });


        return view('Backend.pages.roles.create-edit-roles-page', compact('permissions'));
    }
    private function saveRole($role, $request)
    {

        $role->name = Str::title($request->name);
        $role->slug = Str::slug($request->name);
        $role->save();

        $role->permissions()->sync($request->permissions);
    }
    public function store(StoreRoleRequest $request, Role $role)
    {

        $request->validated();
        $this->saveRole($role, $request);

        $message = $role->name . ' Role has been Added successfully';

        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::query()->get()->groupBy(function ($per) {
            return $per->page_name;
        });
        $rolePermissionsIds =  $role->permissions->pluck('id')->toArray();

        return view('Backend.pages.roles.create-edit-roles-page', compact('role', 'permissions', 'rolePermissionsIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRoleRequest $request, Role $role)
    {

        $request->validated();
        $this->saveRole($role, $request);
        $message = $role->name . ' Role has been updated successfully';

        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {

        $message = $role->name . ' Role has been Deleted successfully';


        return $this->redirectWithSuccessMsg($this->routeName, $message);
    }
}