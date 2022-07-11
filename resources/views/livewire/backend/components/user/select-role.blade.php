<div>
    <div class="mb-3">
        <label for="role_id" class="form-label">Roles</label>
        <select name="role_id" wire:model='selectedRole'
            class="form-select {{ $errors->has('role_id') ? 'is-invalid' : '' }}">
            <option>-- select role --</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
        @include('Backend.components.input-error-msg', ['inputName' => 'role_id'])
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Permissions</h5>
        </div>
        <div class="card-body">
            <div wire:loading.remove>
                @forelse ($permissions as $page => $permission)
                    <div class="role">
                        <h5 class="permission-page-name">{{ $page }}</h5>
                        @foreach ($permission as $value)
                            <div class="form-check permissions-checkbox">
                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                    value="{{ $value['id'] }}" id="permission-{{ $value['id'] }}"
                                    @if ($userPermissionsIds) @checked(in_array($value['id'], $userPermissionsIds)) @endif>
                                <label class="form-check-label" for="permission-{{ $value['id'] }}">
                                    {{ $value['name'] }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                @empty
                    <h5 class="text-center">No Permissions Found</h5>
                @endforelse
            </div>

            <div wire:loading wire:loading.class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>
