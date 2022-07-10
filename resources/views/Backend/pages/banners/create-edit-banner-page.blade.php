@extends('Backend.layouts.master')


@section('title', isset($color) ? 'update banner ' : 'new banner')
@section('content')

    <form method="POST" enctype="multipart/form-data"
        action="{{ isset($banner) ? route('admin.banners.update', $banner) : route('admin.banners.store') }}">
        @csrf
        @if (isset($banner))
            @method('PATCH')
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>{{ !isset($banner) ? ' new' : 'update ' }} banner</h4>
                <div>
                    <input type="submit" class="btn btn-light rounded font-sm mr-5 " name="save_to_draft"
                        value="Save to draft">
                    <input type="submit" class="btn btn-primary btn-md rounded font-sm " value="Publich" name="publich">
                </div>
            </div>
            <div class="card-body">


                {{-- banner Title --}}
                <div class="row mb-3">
                    <label class="col-lg-2 col-form-label" for="name">Banner Title</label>
                    <div class="col-lg-10">

                        <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : ' ' }}"
                            value="{{ old('title', $banner->title ?? '') }}" name="title" id="title"
                            placeholder="Enter banner title">

                        <span class="text-danger">
                            {{ $errors->first('title') }}
                        </span>
                    </div>

                </div>
                {{-- banner link --}}
                <div class="row mb-3">
                    <label class="col-lg-2 col-form-label" for="link">banner link</label>
                    <div class="col-lg-10">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">{{ request()->getHost() }}</span>
                            <input type="text" class="form-control {{ $errors->has('link') ? 'is-invalid' : ' ' }}"
                                id="basic-url" aria-describedby="basic-addon3" placeholder="Enter link"
                                value="{{ old('link', $banner->link ?? '') }}" name="link">
                        </div>

                        <span class="text-danger">
                            {{ $errors->first('link') }}
                        </span>
                    </div>
                </div>
                {{-- main Banner --}}
                <div class="row mb-2">
                    <label class="col-lg-2 col-form-label" for="type">banner type</label>
                    <div class="col-lg-10">
                        <div class="form-check d-flex flex-row align-items-center">
                            @foreach ($bannerType as $index => $type)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input me-1 " type="radio" name="type"
                                        id="type-{{ $index }}" value="{{ $type }}"
                                        {{ isset($banner) && $type == $banner->type ? 'checked' : '' }}>
                                    <label class="form-check-label mt-1" for="type-{{ $index }}">
                                        <h6> {{ $type }} </h6>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <span class="text-danger">
                            {{ $errors->first('type') }}
                        </span>
                    </div>

                </div>
                <div class="row mb-4">
                    <label class="col-lg-2 col-form-label" for="name">Banner Image</label>
                    <div class="col-lg-10">

                        <livewire:backend.components.show-the-temporary-image inputName="image" :imagePath="$banner->image_url ?? null" />

                    </div>

                </div>
            </div>
        </div>
    </form>


@endsection
