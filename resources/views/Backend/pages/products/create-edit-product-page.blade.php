@extends('Backend.layouts.master')


@section('title', isset($product) ? 'update product ' : 'new product')
@section('content')

    <div class="container-fluid">

        <form method="POST" enctype="multipart/form-data"
            action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}">
            @csrf
            @if (isset($product))
                @method('PATCH')
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="content-header">
                        <h4 class="content-title">new product</h4>
                        <div>

                            <input type="submit" class="btn btn-light rounded font-sm mr-5 text-body hover-up"
                                name="save_to_draft" value="Save to draft">
                            <input type="submit" class="btn btn-md rounded font-sm hover-up" value="Publich"
                                name="publich">
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row gx-5">
                                <aside class="col-xl-3 col-lg-4 col-md-4 border-end">
                                    <nav class="nav nav-pills flex-column mb-4">
                                        <div class="nav flex-column nav-pills me-3" id="tab" role="tablist"
                                            aria-orientation="vertical">
                                            <a class="nav-link  active  mb-3" id="home-tab" data-bs-toggle="pill"
                                                data-bs-target="#General" type="button" role="tab" aria-controls="home"
                                                aria-selected="true">
                                                General info</a>

                                            <a class="nav-link     mb-3" id="settings-tab" data-bs-toggle="pill"
                                                data-bs-target="#information_Details" type="button" role="tab"
                                                aria-controls="settings" aria-selected="false">
                                                Information &
                                                Details</a>
                                            <a class="nav-link mb-3" id="settings-tab" data-bs-toggle="pill"
                                                data-bs-target="#size_options" type="button" role="tab"
                                                aria-controls="settings" aria-selected="false">
                                                Size
                                                Options</a>
                                            <a class="nav-link  mb-3" id="settings-tab" data-bs-toggle="pill"
                                                data-bs-target="#Price_Discount" type="button" role="tab"
                                                aria-controls="settings" aria-selected="false">
                                                Price &
                                                Discount</a>

                                            <a class="nav-link  mb-3" id="settings-tab" data-bs-toggle="pill"
                                                data-bs-target="#images" type="button" role="tab"
                                                aria-controls="settings" aria-selected="false">
                                                Images</a>


                                            <a class="nav-link  mb-3" id="messages-tab" data-bs-toggle="pill"
                                                data-bs-target="#SEO" type="button" role="tab" aria-controls="SEO"
                                                aria-selected="false"> SEO</a>
                                        </div>

                                    </nav>
                                </aside>
                                <div class="col-xl-9 col-lg-8 col-md-8">
                                    <div class="tab-content" id="tabContent">
                                        <div class="tab-pane fade show active" id="General" role="tabpanel"
                                            aria-labelledby="home-tab">

                                            <section class="content-body p-xl-4">

                                                <div class="row mb-4">

                                                    <label class="col-lg-3 col-form-label" for="name"> Name</label>
                                                    <div class="col-lg-9">
                                                        <input placeholder="Enter Product Name" type="text"
                                                            id="name" name="name"
                                                            value="{{ old('name', $product->name ?? null) }}"
                                                            class="form-control {{ $errors->has('name') ? 'is-invalid' : ' ' }}">
                                                        <span class="text-danger">
                                                            {{ $errors->first('name') }}
                                                        </span>
                                                    </div>

                                                </div>

                                                <div class="row mb-4">
                                                    <label class="col-lg-3 col-form-label">Brand</label>
                                                    <div class="col-lg-9">
                                                        <select
                                                            class=" form-select {{ $errors->has('id') ? 'is-invalid' : ' ' }}"
                                                            data-style="border" name="id" id="brand_id"
                                                            aria-label="Default select example">

                                                            <option value="">Seclect a brand</option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}"
                                                                    @selected(old('brand_id', $product->brand_id ?? '') == $brand->id)>
                                                                    {{ $brand->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                        <span class="text-danger">
                                                            {{ $errors->first('brand_id') }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-lg-3 col-form-label">Color</label>
                                                    <div class="col-lg-9">
                                                        <select
                                                            class="form-select {{ $errors->has('color_id') ? 'is-invalid' : ' ' }}"
                                                            name="color_id" id="color_id">

                                                            <option value="">Seclect a color</option>
                                                            @foreach ($colors as $color)
                                                                <option value="{{ $color->id }}"
                                                                    @selected(old('color_id', $product->color_id ?? '') == $color->id)>
                                                                    {{ $color->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>

                                                        <span class="text-danger">
                                                            {{ $errors->first('color_id') }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <livewire:backend.components.category.select-category>
                                                    <div class="row mb-4">
                                                        <label class="col-lg-3 col-form-label"
                                                            for="shipping_cost">shipping
                                                            cost
                                                        </label>
                                                        <div class="col-lg-9">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text  w-100 h-100">SAR</span>
                                                                </div>
                                                                <input placeholder="Enter  shipping cost" type="number"
                                                                    step=any name="shipping_cost" id="shipping_cost"
                                                                    value="{{ old('shipping_cost', $product->shipping_cost ?? null) }}"
                                                                    class="form-control {{ $errors->has('shipping_cost') ? 'is-invalid' : ' ' }}">

                                                            </div>
                                                            <span class="text-danger">
                                                                {{ $errors->first('shipping_cost') }}
                                                            </span>
                                                        </div>
                                                    </div>
                                            </section>
                                        </div>

                                        <div class="tab-pane fade" id="information_Details" role="tabpanel"
                                            aria-labelledby="settings-tab">
                                            <section class="content-body p-xl-4">


                                                <div class="row mb-4">
                                                    <label for="ProductDetails" class="col-lg-3 col-form-label">
                                                        Details</label>
                                                    <div class="col-lg-9">
                                                        <textarea id="ProductDetails" class="form-control {{ $errors->has('details') ? 'is-invalid' : ' ' }}"
                                                            name="details" placeholder="Enter ...">  {{ old('details', $product->details ?? null) }} </textarea>


                                                        <span class="text-danger">
                                                            {{ $errors->first('details') }}
                                                        </span>
                                                    </div>

                                                </div>


                                                <div class="row mb-4">
                                                    <label for="ProductInformation"
                                                        class="col-lg-3 col-form-label">Product
                                                        information</label>
                                                    <div class="col-lg-9">
                                                        <textarea id="ProductInformation" class="form-control {{ $errors->has('information') ? 'is-invalid' : ' ' }}"
                                                            name="information" placeholder="Enter ...">  {{ old('information', $product->information ?? null) }} </textarea>
                                                        <span class="text-danger">
                                                            {{ $errors->first('information') }}
                                                        </span>
                                                    </div>
                                                </div>

                                            </section>

                                        </div>

                                        <div class="tab-pane fade" id="SEO" role="tabpanel">
                                            <section class="content-body p-xl-4">
                                                <div class="row mb-4">
                                                    <label class="col-lg-3 col-form-label" for="meta_title">Meta
                                                        Title -
                                                        Optional</label>
                                                    <div class="col-lg-9">

                                                        <input name="meta_title" type="text" class="form-control"
                                                            placeholder="Enter meta title"
                                                            value="{{ old('meta_title', $product->meta_title ?? null) }}">
                                                        <span class="text-danger">
                                                            {{ $errors->first('meta_title') }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label class="col-lg-3 col-form-label" for="meta_keywords">Meta
                                                        Keywords
                                                        -
                                                        Optional</label>
                                                    <div class="col-lg-9">

                                                        <textarea class="form-control {{ $errors->has('meta_keywords') ? 'is-invalid' : ' ' }}" name="meta_keywords"
                                                            rows="3" placeholder="Enter ..."> {{ old('meta_keywords', $product->meta_keywords ?? null) }} </textarea>

                                                        <span class="text-danger">
                                                            {{ $errors->first('meta_keywords') }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label class="col-lg-3 col-form-label" for="meta_description">Meta
                                                        description - Optional</label>
                                                    <div class="col-lg-9">
                                                        <textarea class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : ' ' }}" name="meta_description"
                                                            rows="3" placeholder="Enter ..."> {{ old('meta_description', $product->meta_description ?? null) }}
                                                                                                                                                                                                                                                                                                                    </textarea>
                                                        <span class="text-danger">
                                                            {{ $errors->first('meta_description') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="tab-pane fade" id="size_options" role="tabpanel">
                                            <section class="content-body p-xl-4">
                                                <livewire:backend.components.product.product-size-options :productSizeOptions="$productSizeOptions ?? null">
                                            </section>
                                        </div>
                                        <div class="tab-pane fade" id="images" role="tabpanel">
                                            <section class="content-body p-xl-4">
                                                <livewire:backend.components.product.product-images :productImages="$productImages ?? null">
                                            </section>
                                        </div>
                                        <div class="tab-pane fade" id="Price_Discount" role="tabpanel">
                                            <section class="content-body p-xl-4">
                                                <div class="row mb-4">
                                                    <label class="col-lg-3 col-form-label">Price</label>
                                                    <div class="col-lg-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text  w-100 h-100">SAR</span>
                                                            </div>

                                                            <input placeholder="Enter Price" type="number" step=any
                                                                name="price"
                                                                class="form-control {{ $errors->has('price') ? 'is-invalid' : ' ' }}"
                                                                value="{{ old('price', $product->price ?? null) }}">
                                                        </div>
                                                        <span class="text-danger">
                                                            {{ $errors->first('price') }}
                                                        </span>
                                                    </div>

                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-lg-3 col-form-label" for="discount">Discount
                                                    </label>
                                                    <div class="col-lg-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text w-100 h-100">
                                                                    <i class="fas fa-percent "></i>
                                                                </span>
                                                            </div>
                                                            <input name="discount" type="number" step=any id="discount"
                                                                class="form-control {{ $errors->has('discount') ? 'is-invalid' : ' ' }}"
                                                                value="{{ old('discount', $product->discount ?? null) }}"
                                                                placeholder="Enter Discount">
                                                        </div>
                                                        <span class="text-danger">
                                                            {{ $errors->first('discount') }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-lg-3 col-form-label"
                                                        for="discount_start_at">Discount
                                                        start at - Optional</label>
                                                    <div class="col-lg-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text  w-100 h-100">
                                                                    <i class="fas fa-calendar"></i>
                                                                </span>
                                                            </div>
                                                            <input name="discount_start_at" type="date"
                                                                id="discount_start_at"
                                                                class="form-control {{ $errors->has('discount_start_at') ? 'is-invalid' : ' ' }}"
                                                                value="{{ old('discount_start_at', $product->discount_start_at ?? null) }}">

                                                        </div>
                                                        <span class="text-danger">
                                                            {{ $errors->first('discount_start_at') }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-lg-3 col-form-label"
                                                        for="discount_expires_at">Discount
                                                        expires at - Optional</label>
                                                    <div class="col-lg-9">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text  w-100 h-100">
                                                                    <i class="fas fa-calendar"></i>
                                                                </span>
                                                            </div>
                                                            <input name="discount_expires_at" type="date"
                                                                id="discount_expires_at"
                                                                class="form-control {{ $errors->has('discount_expires_at') ? 'is-invalid' : ' ' }}"
                                                                value="{{ old('discount_expires_at', $product->discount_expires_at ?? null) }}">
                                                        </div>
                                                        <span class="text-danger">
                                                            {{ $errors->first('discount_expires_at') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
