@extends('Backend.layouts.master')
@section('title', isset($category) ? 'update category ' : 'new category')

@section('content')

    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data"
                action="{{ isset($category) ? route('admin.categories.update', $category) : route('admin.categories.store') }}">
                @csrf
                @if (isset($category))
                    @method('PATCH')
                @endif
                <div class="modal-header">
                    <h4 class="modal-title">{{ !isset($category) ? ' new' : 'update ' }} category</h4>
                    <div>
                        <input type="submit" class="btn btn-light rounded font-sm mr-5 text-body hover-up"
                            name="save_to_draft" value="Save to draft">
                        <input type="submit" class="btn btn-md rounded font-sm hover-up" value="Publich" name="publich">
                    </div>
                </div>
                <div class="modal-body">


                    <div class="row ">
                        <div class="col-lg-6 ">
                            <div class="card mb-4">
                                <div class="card-body">

                                    <livewire:backend.components.category.select-category>

                                        <div class="row mb-3">
                                            <label class="col-lg-3 col-form-label" for="name"> name</label>
                                            <div class="col-lg-9">

                                                <input type="text"
                                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : ' ' }}"
                                                    value="{{ old('name', $category->name ?? '') }}" name="name"
                                                    id="name" placeholder="Enter category">

                                                @include('Backend.components.input-error-msg', [
                                                    'inputName' => 'name',
                                                ])
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-lg-3 col-form-label" for="image"> Image</label>
                                            <div class="col-lg-9">
                                                <livewire:backend.components.show-the-temporary-image inputName="image"
                                                    :imagePath="$category->image_url ?? null" />
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 ">

                            <div class="card mb-4">
                                <div class="card-header">
                                    <h4>SEO</h4>
                                </div>
                                <div class="card-body">

                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label" for="meta_title">Meta Title -
                                            Optional</label>
                                        <div class="col-lg-8">

                                            <input name="meta_title" type="text" class="form-control"
                                                placeholder="Enter meta title"
                                                value="{{ old('meta_title', $category->meta_title ?? '') }}">
                                            @include('Backend.components.input-error-msg', [
                                                'inputName' => 'meta_title',
                                            ])
                                        </div>
                                    </div>


                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label" for="meta_keywords">Meta Keywords
                                            -
                                            Optional</label>
                                        <div class="col-lg-8">

                                            <textarea class="form-control {{ $errors->has('meta_keywords') ? 'is-invalid' : ' ' }}" name="meta_keywords"
                                                rows="3" placeholder="Enter ..."> {{ old('meta_keywords', $category->meta_keywords ?? '') }} </textarea>

                                            @include('Backend.components.input-error-msg', [
                                                'inputName' => 'meta_keywords',
                                            ])
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label class="col-lg-3 col-form-label" for="meta_description">Meta
                                            description - Optional</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : ' ' }}" name="meta_description"
                                                rows="3" placeholder="Enter ..."> {{ old('meta_description', $category->meta_description ?? '') }} </textarea>
                                            @include('Backend.components.input-error-msg', [
                                                'inputName' => 'meta_description',
                                            ])
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>




                </div>
            </form>
        </div>

    </div>
@endsection
