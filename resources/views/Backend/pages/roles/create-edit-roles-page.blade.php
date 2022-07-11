@extends('Backend.layouts.master')


@section('title', isset($role) ? 'update role ' : 'new role')
@section('content')

    <div class="container">
        <form method="POST" enctype="multipart/form-data"
            action="{{ isset($role) ? route('admin.roles.update', $role) : route('admin.roles.store') }}">
            @csrf
            @if (isset($role))
                @method('PATCH')
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{ !isset($role) ? 'new' : 'update ' }} role</h5>
                    <button type="submit" class="btn btn-primary">
                        {{ isset($role) ? 'update ' : 'save ' }}
                    </button>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <label for="name"> name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ' ' }}"
                            name="name" id="name" placeholder="Enter role"
                            value="{{ old('name', $role->name ?? '') }}">

                        @include('Backend.components.input-error-msg', ['inputName' => 'name'])
                    </div>
                </div>


            </div>


            <div class="card">
                <div class="card-header">
                    <h5>Permissions</h5>

                </div>
                <div class="card-body">
                    @foreach ($permissions as $page => $permission)
                        <div class="role">
                            <h5 class="permission-page-name">{{ $page }}</h5>
                            @foreach ($permission as $value)
                                <div class="form-check permissions-checkbox">
                                    <input class="form-check-input" type="checkbox" name="permissions[]"
                                        value="{{ $value->id }}" id="permission-{{ $value->id }}"
                                        @if (isset($role)) @checked(in_array($value->id, $rolePermissionsIds)) @endif>
                                    <label class="form-check-label" for="permission-{{ $value->id }}">
                                        {{ $value->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>

        </form>
    </div>



@endsection
