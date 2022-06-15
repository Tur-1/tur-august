@extends('Backend.layouts.master')
@section('title', 'Categories')

@section('content')


    <div class="content-header">

        <h2 class="content-title">Categories </h2>

        <a class="btn btn-primary " href="{{ route('admin.categories.create') }}">new category</a>

    </div>
    <div class="card">
        <div class="card-body">
            <div class=" table table-responsive">
                <table id="example" class="table table-striped table-hover " style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Section</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>

                                <td>
                                    {{ $category->name }}
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"
                                            aria-expanded="false"> <i class="material-icons md-more_horiz"></i> </a>
                                        <div class="dropdown-menu" style="margin: 0px;">

                                            <a href="{{ route('admin.categories.edit', $category) }}"
                                                class="dropdown-item btn  text-secondary ">
                                                Edit
                                            </a>


                                            <form class="dropdown-item" onsubmit="return window.confirm('Are you sure')"
                                                action="{{ route('admin.categories.destroy', $category) }}" method="post">
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
                                <td colspan="6">
                                    <h4 class="text-center">No Categories Found</h4>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>

    </div>


@endsection
