@extends('Backend.layouts.master')
@section('title', 'Users')

@section('content')
    <div class="content-header">

        <span class="content-title">users</span>
        <div class="">
            <a class="btn btn-primary me-2" href="{{ route('admin.users.create') }}">
                <i class="text-muted material-icons md-post_add"></i>
                new user
            </a>

        </div>


    </div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
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
                                {{ $user->role->name }}
                            </td>
                            <td>
                                <div class="dropdown dropup">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light  btn-sm font-sm"
                                        aria-expanded="false"> <i class="material-icons md-more_horiz"></i> </a>
                                    <div class="dropdown-menu" style="margin: 0px;">

                                        <a href="{{ route('admin.users.edit', $user) }}"
                                            class="dropdown-item btn  text-secondary ">
                                            Edit
                                        </a>

                                        <form class="dropdown-item" onsubmit="return window.confirm('Are you sure')"
                                            action="{{ route('admin.users.destroy', $user) }}" method="post"
                                            class="  d-inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}

                                            <button class="btn text-danger btn-sm w-100 text-start p-0 "
                                                type="submit">Delete</button>

                                        </form>


                                    </div>
                                </div> <!-- dropdown //end -->
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
@endsection
