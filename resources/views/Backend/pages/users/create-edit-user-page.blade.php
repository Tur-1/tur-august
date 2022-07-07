@extends('Backend.layouts.master')


@section('title', isset($user) ? 'update user ' : 'new user')
@section('content')



    <div class="card">
        <div class="card-header">
            <h5>{{ !isset($user) ? 'new' : 'update ' }} user</h5>
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



    <div class="card">
        <div class="card-header">
            <h5> orders</h5>
        </div>
        <div class="card-body">

            <table class="table  ">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>billing name</th>
                        <th>date</th>
                        <th>items</th>
                        <th>total </th>
                        <th>status </th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($user->orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $order->created_at->format('d/m/Y h:i A') }}
                            </td>


                            <td>
                                @if ($order->products_count == 1)
                                    {{ $order->products_count }} Item
                                @else
                                    {{ $order->products_count }} Items
                                @endif
                            </td>
                            <td>
                                {{ $order->total }}
                            </td>
                            <td>
                                <span class="badge badge-soft-secondary rounded-pill font-sm">
                                    {{ $order->status->name }}
                                </span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"
                                        aria-expanded="false"> <i class="material-icons md-more_horiz"></i> </a>
                                    <div class="dropdown-menu" style="margin: 0px;">

                                        <a href="{{ route('admin.orders.show', $order) }}"
                                            class="dropdown-item btn  text-secondary ">
                                            show
                                        </a>


                                        <form class="dropdown-item" onsubmit="return window.confirm('Are you sure')"
                                            action="{{ route('admin.orders.destroy', $order) }}" method="post">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}


                                            <button class="btn text-danger btn-sm w-100 text-start p-0 "
                                                type="submit">Delete</button>

                                        </form>

                                    </div>
                                </div>

                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="8">
                                <h6 class="text-center"> No Orders Found</h6>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>





@endsection
