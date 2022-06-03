@extends('Backend.layouts.master')
@section('title', 'Brands')

@section('content')
<div class="content-header">
    <div>
        <h2 class="content-title card-title">Brand </h2>

    </div>
    <div>
        {{-- @can('create', App\Models\products\Brand::class) --}}
        <a class="btn btn-primary"><i class="text-muted material-icons md-post_add"></i>new brand</a>
        {{-- @endcan --}}
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
            @forelse ($brands as $brand)
            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                <figure class="card border-1">
                    <div class="card-header bg-white text-center">
                        <img src="{{ $brand->brand_image_url }}" class="img-fluid " alt="Logo">
                    </div>

                    <figcaption class="card-body  d-flex justify-content-between">
                        <div class="brandname">
                            <h6 class="card-title m-0">{{ $brand->brand_name }}</h6>
                            <a href="{{ route('admin.brands.products', $brand->slug) }}">
                                {{ $brand->products_count }} items </a>

                        </div>



                        <div class="dropdown dropup">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"
                                aria-expanded="false"> <i class="material-icons md-more_horiz"></i> </a>
                            <div class="dropdown-menu" style="margin: 0px;">

                                @can('update', $brand)
                                <a href="{{ route('admin.brands.edit', $brand) }}"
                                    class="dropdown-item btn  text-secondary ">
                                    Edit
                                </a>
                                @endcan
                                @can('delete', $brand)
                                <form class="dropdown-item" onsubmit="return window.confirm('Are you sure')"
                                    action="{{ route('admin.brands.destroy', $brand) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}


                                    <button class="btn text-danger btn-sm w-100 text-start p-0 "
                                        type="submit">Delete</button>

                                </form>
                                @endcan
                            </div>
                        </div> <!-- dropdown //end -->
                    </figcaption>

                </figure>
            </div> <!-- col.// -->
            @empty
            <h4 class="text-center">No Brands Found</h4>
            @endforelse

        </div> <!-- row.// -->
    </div> <!-- card-body end// -->
    <div class="card-footer">
        {{ $brands->links() }}
    </div>
</div> <!-- card end// -->


@endsection