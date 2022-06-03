@extends('Backend.layouts.master')
@section('title', 'Users')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">

            @can('create', App\Models\users\User::class)
            <a class="btn btn-primary " href="{{ route('admin.users.create') }}">new user</a>
            @endcan
        </div>

        <div class="card-body">

            <table id="example" class="table table-striped table-hover " style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->role->name }}
                        </td>

                        <td>
                            <div class="dropdown ">
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"
                                    aria-expanded="false"> <i class="material-icons md-more_horiz"></i> </a>
                                <div class="dropdown-menu" style="margin: 0px;">

                                    @can('update', $user)
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                        class="dropdown-item btn  text-secondary ">
                                        Edit
                                    </a>
                                    @endcan

                                    @can('delete', $user)
                                    <form class="dropdown-item" onsubmit="return window.confirm('Are you sure')"
                                        action="{{ route('admin.users.destroy', $user) }}" method="post"
                                        class="  d-inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}

                                        <button class="btn text-danger btn-sm w-100 text-start p-0 "
                                            type="submit">Delete</button>

                                    </form>
                                    @endcan
                                </div>
                            </div> <!-- dropdown //end -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
</div>

@endsection