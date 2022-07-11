@extends('Backend.layouts.master')
@section('title', 'reviews')

@section('content')
    <div class="container">
        <div class="content-header">
            <span class="content-title">reviews</span>
        </div>
        @forelse ($reviews as $review)
            <div class="card">
                <div class="card-header review-header d-flex justify-content-between align-items-center">
                    <div class="review-name-image">
                        <div class="review-product-image">
                            <img loading="lazy" src="{{ $review['product_image'] }}">
                        </div>
                        <div class="review-user-name">
                            <a href="{{ route('admin.products.edit', $review['product_id']) }}">
                                {{ $review['product_name'] }}
                            </a>
                        </div>
                    </div>
                    <div class="review-date">
                        <span>{{ $review['date'] }}</span>
                    </div>
                </div>
                <div class="card-body review-body">
                    <div class="review-user-image">
                        <img src="{{ $review['user_avatar'] }}">
                    </div>
                    <div class="review w-100">
                        <div class="row mb-3">
                            <span class="review-user-name">{{ $review['user_name'] }}</span>
                        </div>
                        <div class="review-comment mb-1">
                            <p>{{ $review['comment'] }}
                            </p>
                        </div>
                        @if (count($review['reply']) > 0)
                            <div class="d-flex align-items-center pt-3 mb-4 border-top">
                                <i class="fas fa-share fa-flip-vertical me-2"></i>
                                <p> {{ $review['reply']['comment'] ?? '' }}</p>
                            </div>
                        @endif
                        <div class="review-actions mt-3">
                            <button class=" btn btn-outline-secondary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#reply-form-{{ $review['id'] }}">
                                <i class="fas fa-share fa-flip-vertical me-1"></i>
                                {{ $review['reply'] ? 'edit' : '' }} reply

                            </button>

                            <form onsubmit="return window.confirm('Are you sure')"
                                action="{{ route('admin.reviews.destroy', $review['id']) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class=" btn btn-outline-danger" type="submit">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                        <div class="collapse" id="reply-form-{{ $review['id'] }}">
                            <div class="card-body">
                                <form method="POST" class="form-contact comment_form"id="commentForm"
                                    action="{{ $review['reply'] ? route('admin.reviews.update', $review['reply']['id']) : route('admin.reviews.reply', $review['id']) }}">
                                    @csrf
                                    @if (count($review['reply']) > 0)
                                        @method('PATCH')
                                    @endif
                                    <div class="d-flex flex-row align-items-start">
                                        <img src="{{ auth()->user()->avatar_url }}" alt="" width="50"
                                            class="rounded-circle me-2">
                                        <textarea class="form-control ml-4 shadow-none textarea" name="comment" placeholder="write comment">
                                        {{ $review['reply']['comment'] ?? '' }}
                                        </textarea>
                                    </div>
                                    <div class="mt-2 float-end">
                                        <button class="btn btn-primary p-2" type="submit">submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty

            <h5 class="text-center">no reviews Found</h5>
        @endforelse
    </div>

@endsection
