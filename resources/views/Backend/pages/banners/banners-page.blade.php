@extends('Backend.layouts.master')
@section('title', 'Banners')

@section('content')
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Banners</h2>

        </div>
        <div>
            @include('Backend.components.policy-create-button', [
                'model' => App\Models\Banner\Banner::class,
                'route' => route('admin.banners.create'),
                'title' => 'new banner',
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
                @forelse($banners as $banner)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-6">
                        <figure class="card border-1 w-100 h-100">
                            <div class="card-header bg-transparent text-center w-100 h-100">
                                <img src="{{ $banner->image_url }}" class="w-100 h-100" alt="Logo">
                            </div>

                            <figcaption class="card-body  d-flex justify-content-between">
                                <div class="bannername  ">
                                    <h6 class="card-title m-0">{{ $banner->title }}</h6>
                                    <br>

                                    <div class="row m-3 d-flex justify-content-between">

                                        <livewire:backend.components.active-toggle-switch :model="$banner"
                                            field="is_active" :wire:key="$banner->id">
                                    </div>
                                </div>
                                @include('Backend.components.policy-dropdown-edit-delete-buttons', [
                                    'model' => $banner,
                                    'editRoute' => route('admin.banners.edit', $banner),
                                    'deleteRoute' => route('admin.banners.destroy', $banner),
                                ])
                            </figcaption>


                        </figure>
                    </div>
                @empty
                    <h4 class="text-center">No Banners Found</h4>
                @endforelse
            </div>
        </div>
        <div class="card-footer">
            {{ $banners->links() }}
        </div>
    </div>


@endsection
