@extends('Backend.layouts.master')
@section('title', 'Categories')

@section('content')


    <div class="content-header">

        <span class="content-title">Categories </span>
        <div class="">

            @include('Backend.components.policy-create-button', [
                'model' => App\Models\product\Category::class,
                'route' => route('admin.sections.create'),
                'title' => 'new section',
            ])
            @include('Backend.components.policy-create-button', [
                'model' => App\Models\product\Category::class,
                'route' => route('admin.categories.create'),
                'title' => 'new category',
            ])
        </div>


    </div>

    <livewire:backend.pages.categories-page>

    @endsection
