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
            <div class=" table-responsive">
                <table class="table  table-responsive ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Brand</th>
                            <th>Color</th>
                            <th>Category</th>
                            <th>Section</th>
                            <th>In stock</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td style="text-align: left; vertical-align: middle;">
                                    {{ $product->id }}
                                </td>
                                <td>
                                    <img class="image-fluid  " width="100" src="{{ $product->image_url }}"
                                        alt="">

                                </td>
                                <td style="text-align: left; vertical-align: middle;">
                                    {{ $product->name }}
                                </td>
                                <td style="text-align: left; vertical-align: middle;">
                                    {{ $product->price }} SAR
                                </td>
                                <td style="text-align: left; vertical-align: middle;">
                                    {{ $product->brand_name }}
                                </td>
                                <td style="text-align: left; vertical-align: middle;">
                                    {{ $product->color_name }}
                                </td>
                                <td style="text-align: left; vertical-align: middle;">
                                    {{ $product->category_name }}
                                </td>
                                <td style="text-align: left; vertical-align: middle;">
                                    {{ $product->section_name }}
                                </td>


                                <td style="text-align: left; vertical-align: middle;">

                                    @if ($product->stock == 0)
                                        <span class=" badge badge-soft-danger"> out of stock</span>
                                    @elseif ($product->stock <= 6)
                                        <span class=" badge badge-soft-warning"> only
                                            {{ $product->stock }} left in stock</span>
                                    @else
                                        {{ $product->stock }}
                                    @endif
                                </td>
                                <td style="text-align: left; vertical-align: middle;">

                                    {{-- @livewire('admin.reusable-components.active-toggle-switch', ['model' => $product, 'field' => 'is_active'], key($product->id)) --}}

                                </td>
                                <td class="text-center" style="text-align: left; vertical-align: middle;">
                                    <div class="dropdown dropup">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-light  btn-sm font-sm"
                                            aria-expanded="false"> <i class="material-icons md-more_horiz"></i> </a>
                                        <div class="dropdown-menu" style="margin: 0px;">

                                            <a href="{{ route('admin.products.edit', $product) }}"
                                                class="dropdown-item btn  text-secondary ">
                                                Edit
                                            </a>


                                            <form class="dropdown-item" onsubmit="return window.confirm('Are you sure')"
                                                action="{{ route('admin.products.destroy', $product) }}" method="post"
                                                class="  d-inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}

                                                <button class="btn text-danger btn-sm w-100 text-start p-0 "
                                                    type="submit">Delete</button>

                                            </form>

                                        </div>
                                    </div> <!-- dropdown //end -->
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td valign="top" colspan="13" class="dataTables_empty text-center">
                                    <h5>No products Found</h5>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

                <footer>
                    {{ $products->links() }}
                </footer>
            </div>

        </div>

    </div>

@endsection
