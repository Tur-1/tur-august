@extends('Backend.layouts.master')
@section('title', 'Brands')

@section('content')
    <div class="content-header">
        <div>
            <span class="content-title">Brands</span>

        </div>
        <div>

            @include('Backend.components.policy-create-button', [
                'model' => App\Models\product\Brand::class,
                'route' => route('admin.brands.create'),
                'title' => 'new brand',
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
        </header>
        <div class="card-body">
            <div class="row gx-3">
                @forelse ($brands as $brand)
                    <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                        <figure class="card border-1">
                            <div class="card-header bg-white text-center">
                                <img src="{{ $brand->image_url }}" class="img-fluid " alt="Logo">
                            </div>

                            <figcaption class="card-body  d-flex justify-content-between">
                                <div class="brandname">
                                    <h6 class="card-title m-0">{{ $brand->name }}</h6>
                                    <span>
                                        {{ $brand->products_count }} items
                                    </span>

                                </div>
                                @include('Backend.components.policy-dropdown-edit-delete-buttons', [
                                    'model' => $brand,
                                    'editRoute' => route('admin.brands.edit', $brand),
                                    'deleteRoute' => route('admin.brands.destroy', $brand),
                                ])
                            </figcaption>

                        </figure>
                    </div>
                @empty
                    <h4 class="text-center">No Brands Found</h4>
                @endforelse

            </div>
        </div>
        <div class="card-footer">
            {{ $brands->links() }}
        </div>
    </div>
@endsection
