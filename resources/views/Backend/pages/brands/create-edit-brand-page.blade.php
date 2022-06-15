@extends('Backend.layouts.master')


@section('title', isset($brand) ? 'update brand ' : 'new brand')
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
                                <label for="name">Brand name</label>
                                <input name="name" type="text"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : ' ' }}" name="name"
                                    id="name" placeholder="Enter Brand" value="{{ old('name', $brand->name ?? '') }}">
                                @include('Backend.components.input-error-msg', ['inputName' => 'name'])
                            </div>
                            <div class="form-group">

                                <label for="image">Brand Image</label>
                                <livewire:backend.show-the-temporary-image inputName="image" :imagePath="$brand->image_url ?? null" />
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                {{ isset($brand) ? 'Update brand' : 'save brand' }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
