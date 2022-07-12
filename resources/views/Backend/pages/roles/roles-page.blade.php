@extends('Backend.layouts.master')
@section('title', 'roles')

@section('content')
    <div class="container">
        <div class="content-header">

            <span class="content-title">roles</span>
            <div class="">

                @include('Backend.components.policy-create-button', [
                    'model' => App\Models\user\Role::class,
                    'route' => route('admin.roles.create'),
                    'title' => 'new role',
                ])
            </div>


        </div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <td>
                                    {{ $role->id }}
                                </td>

                                <td>
                                    {{ $role->name }}
                                </td>


                                <td>
                                    @include('Backend.components.policy-dropdown-edit-delete-buttons', [
                                        'model' => $role,
                                        'editRoute' => route('admin.roles.edit', $role),
                                        'deleteRoute' => route('admin.roles.destroy', $role),
                                    ])
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td valign="top" colspan="13" class="dataTables_empty text-center">
                                    <h5>No roles Found</h5>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
