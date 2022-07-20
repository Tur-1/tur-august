@extends('Backend.layouts.master')


@section('title', isset($sizeOption) ? 'update size ' : 'new size')
@section('content')
    <div class=" container-sm">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="content-title">{{ !isset($sizeOption) ? 'new size' : 'update size' }} </h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data"
                        action="{{ isset($sizeOption) ? route('admin.sizeOptions.update', $sizeOption) : route('admin.sizeOptions.store') }}">
                        @csrf
                        @if (isset($sizeOption))
                            @method('PATCH')
                        @endif


                        <div class="row mb-4">
                            <label class="col-lg-3 col-form-label" for="name">size name</label>
                            <div class="col">

                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ' ' }}"
                                    value="{{ old('name', $sizeOption->name ?? '') }}" name="name" id="name"
                                    placeholder="Enter size name">

                                @include('Backend.components.input-error-msg', ['inputName' => 'name'])
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                {{ isset($sizeOption) ? 'update' : 'save' }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
