@extends('Backend.layouts.master')
@section('title', isset($category) ? 'update section ' : 'new section')

@section('content')

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ !isset($category) ? ' new' : 'update ' }} section</h4>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data"
                    action="{{ isset($category) ? route('admin.sections.update', $category) : route('admin.sections.store') }}">
                    @csrf
                    @if (isset($category))
                        @method('PATCH')
                    @endif

                    <div class="row ">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-lg-2 col-form-label" for="name"> name</label>
                                    <div class="col-lg-10">

                                        <input type="text"
                                            class="form-control {{ $errors->has('name') ? 'is-invalid' : ' ' }}"
                                            value="{{ old('name', $category->name ?? '') }}" name="name" id="name"
                                            placeholder="Enter section">

                                        @include('Backend.components.input-error-msg', [
                                            'inputName' => 'name',
                                        ])
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <label class="col-lg-2 col-form-label" for="image"> Image</label>
                                    <div class="col-lg-10">
                                        <livewire:backend.components.show-the-temporary-image inputName="image"
                                            :imagePath="$category->image_url ?? null" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-light rounded font-sm mr-5 text-body hover-up"
                            name="save_to_draft" value="Save to draft">
                        <input type="submit" class="btn btn-md rounded font-sm hover-up" value="Publich" name="publich">
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
