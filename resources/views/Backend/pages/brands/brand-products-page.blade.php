@extends('Backend.layouts.master')
@section('title', 'Brands')

@section('content')

<div class="card">
    <div class="card-header  d-flex justify-content-between">
        <div class=" d-flex flex-row align-items-center">
            <img src="{{ $brand->brand_image_url }}" class="card-img-top me-3" alt="Logo">
            <h2>{{ $brand->brand_name }} </h2>
        </div>
        <div>
            <form method="get">
                <div class="input-group mb-3">
                    <input type="text" placeholder="Search..." name="search" class="form-control">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                            class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            @include('includes.admin.products.products')

        </div>
    </div>
</div>

@endsection