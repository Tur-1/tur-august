@extends('Backend.layouts.master')


@section('title', isset($color) ? 'update brand ' : 'new brand')
@section('content')
<!-- Modal -->
<div class=" container">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">{{ !isset($brand) ? ' new' : 'update ' }} brand</h4>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data"
                    action="{{ isset($brand) ? route('admin.brands.update', $brand) : route('admin.brands.store') }}">
                    @csrf
                    @if (isset($brand))
                    @method('PATCH')
                    @endif

                    <div class="row">
                        <div class="form-group mb-2">
                            <label for="brand_name">Brand name</label>
                            <input name="brand_name" type="text"
                                class="form-control {{ $errors->has('brand_name') ? 'is-invalid' : ' ' }}"
                                name="brand_name" id="brand_name" placeholder="Enter Brand"
                                value="{{ old('brand_name', $brand->brand_name ?? '') }}">
                            <span class="text-danger">
                                {{ $errors->first('brand_name') }}
                            </span>
                        </div>
                        <div class="form-group">

                            <label for="brand_image">Brand Image</label>
                            @livewire('admin.reusable-components.show-the-temporary-image', [
                            'ImageInputName' =>'brand_image',
                            'ImagePath' => $brand->brand_image_url ?? null
                            ])
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            {{ isset($brand) ? 'Update brand' : 'Add brand' }}
                        </button>
                    </div>

                </form>
            </div>




        </div>
    </div>

</div>




@endsection