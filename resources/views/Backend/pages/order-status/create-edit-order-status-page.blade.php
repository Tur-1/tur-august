@extends('Backend.layouts.master')


@section('title', isset($orderStatus) ? 'update status ' : 'new status')
@section('content')
    <!-- Modal -->
    <div class="container">
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="content-title">{{ !isset($orderStatus) ? 'new' : 'update ' }} status</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data"
                        action="{{ isset($orderStatus) ? route('admin.status.update', $orderStatus) : route('admin.status.store') }}">
                        @csrf
                        @if (isset($orderStatus))
                            @method('PATCH')
                        @endif
                        <div class="row">
                            <div class="form-group mb-2">
                                <label for="name"> name</label>
                                <input name="name" type="text"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : ' ' }}" name="name"
                                    id="name" placeholder="Enter name"
                                    value="{{ old('name', $orderStatus->name ?? '') }}">

                                @include('Backend.components.input-error-msg', ['inputName' => 'name'])
                            </div>
                            <div class="form-group mb-2">
                                <label for="name">description</label>

                                <textarea name="description" autocomplete="on" placeholder="Enter status description"
                                    class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" cols="10"
                                    rows="5">
                                    {{ $orderStatus->description ?? '' }}
                                </textarea>

                                @include('Backend.components.input-error-msg', [
                                    'inputName' => 'description',
                                ])
                            </div>
                            <div class="form-group">
                                <label for="image"> Image</label>
                                <livewire:backend.components.show-the-temporary-image inputName="image" :imagePath="$orderStatus->image_url ?? null" />
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                {{ isset($orderStatus) ? 'update ' : 'save ' }}
                            </button>
                        </div>

                    </form>
                </div>




            </div>
        </div>

    </div>

@endsection
