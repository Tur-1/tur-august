@extends('Backend.layouts.master')


@section('title', isset($user) ? 'update user ' : 'new user')
@section('content')

<div class="container">
    <div class="row">
        <div class="{{ isset($user) ? 'col-md-5' : 'row' }}">
            <div class="card">
                <div class="card-header">
                    <h4>{{ !isset($user) ? 'new' : 'update ' }} user</h4>
                </div>
                <form method="POST" enctype="multipart/form-data"
                    action="{{ isset($user) ? route('admin.users.update', $user) : route('admin.users.store') }}">
                    @csrf
                    @if (isset($user))
                    @method('PATCH')
                    @endif
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="name">user name</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ' ' }}"
                                name="name" id="name" placeholder="Enter user"
                                value="{{ old('name', $user->name ?? '') }}">

                            <span class="text-danger">
                                {{ $errors->first('name') }}
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ old('email', $user->email ?? '') }}">

                            <span class="text-danger">
                                {{ $errors->first('email') }}
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">

                            <span class="text-danger">
                                {{ $errors->first('password') }}
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="Gender" class="form-label">Gender</label>
                            <select name="gender" class="form-select {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                                @foreach ($Gender as $gen)
                                <option value="{{ $gen }}" {{ old('gender', $user->gender ?? '') == $gen ? 'selected' :
                                    '' }}>
                                    {{ $gen }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                {{ $errors->first('gender') }}
                            </span>
                        </div>
                        {{-- Roles && Permissions --}}
                        <div class="mb-3">
                            @if (isset($user) && !is_null($user->role_id))
                            @livewire('admin.users.select-role', [
                            'UserRoleId' => $user->role_id,
                            'permissionsIds' => $user->permissions->pluck('id')->toArray()
                            ])
                            @else
                            @livewire('admin.users.select-role')
                            @endif


                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ isset($user) ? 'update ' : 'create ' }}
                        </button>
                    </div>


                </form>

            </div>
        </div>
        @if (isset($user))
        <div class="col-md-7">
            <div class="card mb-4">
                <header class="card-header">
                    <h4 class="card-title"> orders</h4>
                </header>

                {{-- user orders --}}


            </div>
            @if (!$user->address->isEmpty())
            <div class="card">
                <div class="card-header">
                    Addresses
                </div>
                <div class="card-body">
                    @livewire('user-address.user-addresses', ['userId' => $user->id, 'InBackend' => true])

                </div>
            </div>
            @endif

        </div>
        @endif
    </div>
</div>



@endsection