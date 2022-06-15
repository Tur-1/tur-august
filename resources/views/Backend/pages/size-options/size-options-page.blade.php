@extends('Backend.layouts.master')
@section('title', 'Size')

@section('content')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">size </h2>

        </div>
        <div>

            <a class="btn btn-primary" href="{{ route('admin.sizeOptions.create') }}">
                <i class=" text-muted material-icons md-post_add"></i>
                new size
            </a>

        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 mb-lg-0 mb-15 me-auto">
                    <form method="get">
                        <div class="input-group mb-3">
                            <input type="text" placeholder="Search..." name="search" class="form-control">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                    class="fas fa-search"></i></button>
                        </div>

                    </form>

                </div>

            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="row gx-3">
                <table id="example" class="table table-striped table-hover " style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>size Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sizeOptions as $size)
                            <tr>
                                <td>{{ $size->id }}</td>

                                <td>
                                    {{ $size->name }}
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"
                                            aria-expanded="false"> <i class="material-icons md-more_horiz"></i> </a>
                                        <div class="dropdown-menu" style="margin: 0px;">

                                            <a href="{{ route('admin.sizeOptions.edit', $size) }}"
                                                class="dropdown-item btn  text-secondary ">
                                                Edit
                                            </a>


                                            <form class="dropdown-item" onsubmit="return window.confirm('Are you sure')"
                                                action="{{ route('admin.sizeOptions.destroy', $size) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}


                                                <button class="btn text-danger btn-sm w-100 text-start p-0 "
                                                    type="submit">Delete</button>

                                            </form>

                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <div class="card-footer">
            {{ $sizeOptions->links() }}
        </div>
    </div>


@endsection
