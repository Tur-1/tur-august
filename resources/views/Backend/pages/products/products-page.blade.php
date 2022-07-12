@extends('Backend.layouts.master')
@section('title', 'Products')

@section('content')
    <div class="content-header">

        <span class="content-title">Products </span>
        <div class="">

            @include('Backend.components.policy-create-button', [
                'model' => App\Models\product\Product::class,
                'route' => route('admin.products.create'),
                'title' => 'new product',
            ])
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
                                <td style=" vertical-align: middle;">
                                    {{ $product->id }}
                                </td>
                                <td>
                                    <img class="image-fluid  " width="100" src="{{ $product->main_image_url }}"
                                        alt="">

                                </td>
                                <td style=" vertical-align: middle;">
                                    {{ $product->name }}
                                </td>
                                <td style=" vertical-align: middle;">
                                    {{ $product->price }} SAR
                                </td>
                                <td style=" vertical-align: middle;">
                                    {{ $product->brand_name }}
                                </td>
                                <td style=" vertical-align: middle;">
                                    {{ $product->color_name }}
                                </td>
                                <td style=" vertical-align: middle;">
                                    {{ $product->category_name }}
                                </td>
                                <td style=" vertical-align: middle;">
                                    {{ $product->section_name }}
                                </td>


                                <td style=" vertical-align: middle;">

                                    @if ($product->stock == 0)
                                        <span class=" badge badge-soft-danger"> out of stock</span>
                                    @elseif ($product->stock <= 6)
                                        <span class=" badge badge-soft-warning"> only
                                            {{ $product->stock }} left in stock</span>
                                    @else
                                        {{ $product->stock }}
                                    @endif
                                </td>
                                <td style=" vertical-align: middle;">

                                    <livewire:backend.components.active-toggle-switch :model="$product" field="is_active"
                                        :wire:key="$product->id">
                                </td>
                                <td style=" vertical-align: middle;">
                                    @include('Backend.components.policy-dropdown-edit-delete-buttons', [
                                        'model' => $product,
                                        'editRoute' => route('admin.products.edit', $product),
                                        'deleteRoute' => route('admin.products.destroy', $product),
                                    ])
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
