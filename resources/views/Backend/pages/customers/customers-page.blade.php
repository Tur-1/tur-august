@extends('Backend.layouts.master')
@section('title', 'Customers')

@section('content')
    <div class="content-header">

        <span class="content-title">customers</span>


    </div>
    <div class="card">
        <div class="card-body">
            <div class=" table-responsive">
                <table class="table  table-responsive ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>

                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>

                                <td>
                                    @include('Backend.components.policy-dropdown-edit-delete-buttons', [
                                        'model' => $user,
                                        'editRoute' => route('admin.users.edit', $user),
                                        'deleteRoute' => route('admin.users.destroy', $user),
                                    ])
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td valign="top" colspan="13" class="dataTables_empty text-center">
                                    <h5>No users Found</h5>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
