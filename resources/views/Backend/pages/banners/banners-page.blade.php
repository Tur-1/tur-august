@extends('Backend.layouts.master')
@section('title', 'Banners')

@section('content')
<div class="content-header">
    <div>
        <h2 class="content-title card-title">Banners</h2>

    </div>
    <div>
        @can('create', App\Models\sections\Banner::class)
        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary"><i
                class="text-muted material-icons md-post_add"></i>new banner</a>
        @endcan
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
                        <img src="{{ $banner->banner_image_url }}" class="w-100 h-100" alt="Logo">
                    </div>

                    <figcaption class="card-body  d-flex justify-content-between">
                        <div class="bannername  ">
                            <h6 class="card-title m-0">{{ $banner->banner_name }}</h6>
                            <br>

                            <div class="row m-3 d-flex justify-content-between">

                                @livewire('admin.reusable-components.active-toggle-switch',
                                ['model' => $banner ,'field' =>'is_active'], key($banner->id))
                            </div>
                        </div>
                        <div class="dropdown dropup">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"
                                aria-expanded="false"> <i class="material-icons md-more_horiz"></i> </a>
                            <div class="dropdown-menu" style="margin: 0px;">

                                @can('update', $banner)
                                <a href="{{ route('admin.banners.edit', $banner) }}"
                                    class="dropdown-item btn  text-secondary ">
                                    Edit
                                </a>
                                @endcan
                                @can('delete', $banner)
                                <form class="dropdown-item" onsubmit="return window.confirm('Are you sure')"
                                    action="{{ route('admin.banners.destroy', $banner) }}" method="post">
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
            <h4 class="text-center">No Banners Found</h4>
            @endforelse
        </div> <!-- row.// -->
    </div> <!-- card-body end// -->
    <div class="card-footer">
        {{ $banners->links() }}
    </div>
</div> <!-- card end// -->


@endsection