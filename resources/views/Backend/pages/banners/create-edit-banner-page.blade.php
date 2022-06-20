@extends('Backend.layouts.master')


@section('title', isset($color) ? 'update banner ' : 'new banner')
@section('content')
    <div class="container">
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
                        <input type="submit" class="btn btn-light rounded font-sm mr-5 text-body hover-up"
                            name="save_to_draft" value="Save to draft">
                        <input type="submit" class="btn btn-md rounded font-sm hover-up" value="Publich" name="publich">
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card mb-4 border-0">
                            <div class="card-body">
                                {{-- banner Title --}}
                                <div class="row mb-3">
                                    <label class="col-lg-2 col-form-label" for="banner_name">Banner Title</label>
                                    <div class="col-lg-10">

                                        <input type="text"
                                            class="form-control {{ $errors->has('banner_title') ? 'is-invalid' : ' ' }}"
                                            value="{{ old('banner_title', $banner->banner_title ?? '') }}"
                                            name="banner_title" id="banner_title" placeholder="Enter banner title">

                                        <span class="text-danger">
                                            {{ $errors->first('banner_title') }}
                                        </span>
                                    </div>

                                </div>
                                {{-- banner link --}}
                                <div class="row mb-3">
                                    <label class="col-lg-2 col-form-label" for="banner_link">banner link</label>
                                    <div class="col-lg-10">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"
                                                id="basic-addon3">{{ request()->getHost() }}</span>
                                            <input type="text"
                                                class="form-control {{ $errors->has('banner_link') ? 'is-invalid' : ' ' }}"
                                                id="basic-url" aria-describedby="basic-addon3" placeholder="Enter link"
                                                value="{{ old('banner_link', $banner->banner_link ?? '') }}"
                                                name="banner_link">
                                        </div>

                                        <span class="text-danger">
                                            {{ $errors->first('banner_link') }}
                                        </span>
                                    </div>
                                </div>
                                {{-- main Banner --}}
                                <div class="row mb-2">
                                    <label class="col-lg-2 col-form-label" for="banner_type">banner type</label>
                                    <div class="col-lg-10">
                                        <div class="form-check d-flex flex-row align-items-center">
                                            @foreach ($bannerType as $index => $type)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input me-1 " type="radio" name="banner_type"
                                                        id="type-{{ $index }}" value="{{ $type }}"
                                                        {{ isset($banner) && $type == $banner->banner_type ? 'checked' : '' }}>
                                                    <label class="form-check-label mt-1" for="type-{{ $index }}">
                                                        <h6> {{ $type }} </h6>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <span class="text-danger">
                                            {{ $errors->first('banner_type') }}
                                        </span>
                                    </div>

                                </div>
                                <div class="row mb-4">
                                    <label class="col-lg-2 col-form-label" for="banner_name">Banner Image</label>
                                    <div class="col-lg-10">

                                        @livewire('admin.reusable-components.show-the-temporary-image', [
                                            'ImageInputName' => 'banner_image',
                                            'ImagePath' => $banner->banner_image_url ?? null,
                                        ])

                                    </div>

                                </div>

                            </div>
                        </div> <!-- card end// -->

                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
