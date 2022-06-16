@extends('Backend.layouts.master')
@section('title', 'Categories')

@section('content')


    <div class="content-header">

        <h2 class="content-title">Categories </h2>
        <div class="">
            <a class="btn btn-primary me-2" href="{{ route('admin.sections.create') }}">
                <i class="text-muted material-icons md-post_add"></i>
                new section
            </a>
            <a class="btn btn-primary " href="{{ route('admin.categories.create') }}">
                <i class="text-muted material-icons md-post_add"></i>
                new category
            </a>
        </div>


    </div>

    <livewire:backend.pages.categories-page>

    @endsection
