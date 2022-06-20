@extends('Backend.layouts.master')


@section('title', isset($user) ? 'update user ' : 'new user')
@section('content')

    <div class="container-fluid">
        <div class="row">
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
                            <label for="name"> name</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ' ' }}"
                                name="name" id="name" placeholder="Enter user"
                                value="{{ old('name', $user->name ?? '') }}">

                            @include('Backend.components.input-error-msg', ['inputName' => 'name'])
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ old('email', $user->email ?? '') }}">

                            @include('Backend.components.input-error-msg', ['inputName' => 'email'])
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">

                            @include('Backend.components.input-error-msg', ['inputName' => 'password'])
                        </div>
                        <div class="mb-3">
                            <label for="Gender" class="form-label">Gender</label>
                            <select name="gender" class="form-select {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                                @foreach ($gender as $value)
                                    <option value="{{ $value }}"
                                        {{ old('gender', $user->gender ?? '') == $value ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                            @include('Backend.components.input-error-msg', ['inputName' => 'gender'])
                        </div>
                        {{-- Roles && Permissions --}}
                        <div class="mb-3">



                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ isset($user) ? 'update ' : 'save ' }}
                        </button>
                    </div>


                </form>

            </div>
        </div>
    </div>



@endsection
