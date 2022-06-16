@extends('Backend.layouts.master')
@section('title', 'Products')

@section('content')
    <div class="content-header">

        <h2 class="content-title">Products </h2>
        <div class="">
            <a class="btn btn-primary me-2" href="{{ route('admin.products.create') }}">
                <i class="text-muted material-icons md-post_add"></i>
                new product
            </a>

        </div>


    </div>
    <div class="card">

        <div class="card-body">
            <div class=" table table-responsive">
                <table id="example" class="table table-striped table-hover " style="width:100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>image</th>
                            <th>name</th>
                            <th>section</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5">
                                <h4 class="text-center">No products Found</h4>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div>

    </div>

@endsection
