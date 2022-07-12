@extends('Backend.layouts.master')
@section('title', 'size options')

@section('content')
    <div class="content-header">
        <div>
            <span class="content-title ">size options</span>

        </div>
        <div>

            @include('Backend.components.policy-create-button', [
                'model' => App\Models\product\SizeOption::class,
                'route' => route('admin.sizeOptions.create'),
                'title' => 'new size',
            ])
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
                            <th>name</th>
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
                                    @include('Backend.components.policy-dropdown-edit-delete-buttons', [
                                        'model' => $size,
                                        'editRoute' => route('admin.sizeOptions.edit', $size),
                                        'deleteRoute' => route('admin.sizeOptions.destroy', $size),
                                    ])


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
