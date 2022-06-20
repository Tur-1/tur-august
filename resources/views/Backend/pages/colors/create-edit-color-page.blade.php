@extends('Backend.layouts.master')


@section('title', isset($color) ? 'update color ' : 'new color')
@section('content')
    <!-- Modal -->
    <div class="container">
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
                                <label for="name">color name</label>
                                <input name="name" type="text"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : ' ' }}" name="name"
                                    id="name" placeholder="Enter color"
                                    value="{{ old('name', $color->name ?? '') }}">

                                @include('Backend.components.input-error-msg', ['inputName' => 'name'])
                            </div>
                            <div class="form-group">

                                <label for="image">color Image</label>
                                <livewire:backend.components.show-the-temporary-image inputName="image" :imagePath="$color->image_url ?? null" />

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                {{ isset($color) ? 'Update color' : 'save color' }}
                            </button>
                        </div>

                    </form>
                </div>




            </div>
        </div>

    </div>

@endsection
