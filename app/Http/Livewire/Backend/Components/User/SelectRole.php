<?php

namespace App\Http\Livewire\Backend\Components\User;

use Livewire\Component;
use App\Models\user\Role;

class SelectRole extends Component
{
    public $selectedRole = null;
    public $userPermissionsIds;
    public $role;
    public $roles;
    public $permissions = [];


    public function updatedSelectedRole($role_id)
    {
        if (is_null($role_id)) return;

        $roleId = intval($role_id);

        $this->role = $this->roles->find($roleId);

        if (!is_null($this->role)) {
            $this->permissions = $this->role->permissions->groupBy(function ($per) {
                return $per->page_name;
            })->toArray();
        }
    }
    public function mount($roleId = null, $permissionsIds = null)
    {

        $this->roles = Role::with('permissions')->get();

        if (!is_null($roleId)) {
            $this->selectedRole = $roleId;
            $this->permissions = $this->roles->find($this->selectedRole)->permissions->groupBy(function ($per) {
                return $per->page_name;
            })->toArray();


            $this->userPermissionsIds = $permissionsIds;
        }

        if (old('role_id')) {
            $this->selectedRole = old('role_id');
        }
    }
    public function render()
    {

        return view('livewire.backend.components.user.select-role');
    }
}