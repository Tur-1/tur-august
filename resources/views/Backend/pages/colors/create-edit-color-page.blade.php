@extends('Backend.layouts.master')


@section('title', isset($color) ? 'update color ' : 'new color')
@section('content')
<!-- Modal -->
<div class=" container-sm">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">

                <h4 class="content-title">{{ !isset($color) ? 'new' : 'update ' }} color</h4>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data"
                    action="{{ isset($color) ? route('admin.colors.update', $color) : route('admin.colors.store') }}">
                    @csrf
                    @if (isset($color))
                    @method('PATCH')
                    @endif
                    <div class="row">
                        <div class="form-group mb-2">
                            <label for="color_name">color name</label>
                            <input name="color_name" type="text"
                                class="form-control {{ $errors->has('color_name') ? 'is-invalid' : ' ' }}"
                                name="color_name" id="color_name" placeholder="Enter color"
                                value="{{ old('color_name', $color->color_name ?? '') }}">
                            <span class="text-danger">
                                {{ $errors->first('color_name') }}
                            </span>
                        </div>
                        <div class="form-group">

                            <label for="brand_image">color Image</label>
                            @livewire('admin.reusable-components.show-the-temporary-image', [
                            'ImageInputName' =>'color_image',
                            'ImagePath' => $color->color_image_url ?? null
                            ])
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            {{ isset($color) ? 'Update color' : 'Add color' }}
                        </button>
                    </div>

                </form>
            </div>




        </div>
    </div>

</div>




@endsection