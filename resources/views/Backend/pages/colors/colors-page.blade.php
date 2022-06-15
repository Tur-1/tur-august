@extends('Backend.layouts.master')
@section('title', 'Colors')

@section('content')
<div class="content-header">
    <div>
        <h2 class="content-title card-title">Colors </h2>

    </div>
    <div>
        {{-- @can('create', App\Models\products\Color::class) --}}
        <a class="btn btn-primary" href="{{ route('admin.colors.create') }}">
            <i class="text-muted material-icons md-post_add"></i>
            new color
        </a>

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
            @forelse ($colors as $index => $color)
            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                <figure class="card border-1">
                    <div class="card-header bg-transparent text-center">
                        <img height="76" src="{{ $color->image_url }}" class="img-fluid" alt="Logo">
                    </div>

                    <figcaption class="card-body  d-flex justify-content-between m-2">
                        <div class="colorname">
                            <h6 class="card-title m-0">{{ $color->name }}</h6>
                            <a href="">
                                {{ $color->products_count }} items </a>

                        </div>



                        <div class="dropdown dropup ">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i
                                    class="material-icons md-more_horiz"></i> </a>
                            <div class="dropdown-menu">

                                <a href="{{ route('admin.colors.edit', $color) }}"
                                    class="dropdown-item btn  text-secondary ">
                                    Edit
                                </a>
                                <form class="dropdown-item" onsubmit="return window.confirm('Are you sure')"
                                    action="{{ route('admin.colors.destroy', $color) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}


                                    <button class="btn text-danger btn-sm w-100 text-start p-0 "
                                        type="submit">Delete</button>

                                </form>

                            </div>
                        </div> <!-- dropdown //end -->
                    </figcaption>

                </figure>
            </div> <!-- col.// -->
            @empty

            <h4 class="text-center">No Colors Found</h4>
            @endforelse
        </div> <!-- row.// -->
    </div> <!-- card-body end// -->
    <div class="card-footer">
        {{ $colors->links() }}
    </div>
</div> <!-- card end// -->


@endsection