@extends('Backend.layouts.master')

@section('title', isset($brand) ? 'update coupon ' : 'new coupon')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="content-title">{{ !isset($coupon) ? 'new' : 'update ' }} coupon</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data"
                        action="{{ isset($coupon) ? route('admin.coupons.update', $coupon) : route('admin.coupons.store') }}">
                        @csrf
                        @if (isset($coupon))
                            @method('PATCH')
                        @endif
                        <div class="row mb-4">
                            <label class="col-lg-4 col-form-label" for="code"> Coupon code</label>
                            <div class="col-lg-8">
                                <input placeholder="Enter Coupon code" type="text" id="code" name="code"
                                    value="{{ old('code', $coupon->code ?? null) }}"
                                    class="form-control {{ $errors->has('code') ? 'is-invalid' : ' ' }}">
                                @include('Backend.components.input-error-msg', ['inputName' => 'code'])
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-lg-4 col-form-label" for="type"> Coupon Type</label>
                            <div class="col-lg-8">
                                <select name="type" class="form-select {{ $errors->has('type') ? 'is-invalid' : ' ' }}"
                                    aria-label="Default select example">
                                    @foreach ($couponTypes as $index => $type)
                                        <option value="{{ $type }}"
                                            @if (isset($coupon) && $type == $coupon->type) selected @endif>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>
                                @include('Backend.components.input-error-msg', ['inputName' => 'type'])
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-lg-4 col-form-label" for="amount"> Coupon amount</label>
                            <div class="col-lg-8">
                                <input type="number" step="any"
                                    class="form-control {{ $errors->has('amount') ? 'is-invalid' : ' ' }}" name="amount"
                                    id="value" placeholder="Enter coupon amount"
                                    value="{{ old('amount', $coupon->amount ?? '') }}">
                                @include('Backend.components.input-error-msg', ['inputName' => 'amount'])
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-lg-4 col-form-label" for="use_times"> Use times</label>
                            <div class="col-lg-8">
                                <input type="number" step=any
                                    class="form-control {{ $errors->has('use_times') ? 'is-invalid' : ' ' }}"
                                    name="use_times" id="use_times" placeholder="Enter Use times"
                                    value="{{ old('use_times', $coupon->use_times ?? '') }}">
                                @include('Backend.components.input-error-msg', [
                                    'inputName' => 'use_times',
                                ])
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-lg-4 col-form-label" for="minimum_purchases"> Minimum Purchases</label>
                            <div class="col-lg-8">
                                <input type="number" step=any
                                    class="form-control {{ $errors->has('minimum_purchases') ? 'is-invalid' : ' ' }}"
                                    id="minimum_purchases" name="minimum_purchases" id="minimum_purchases"
                                    placeholder="Enter Minimum Purchases"
                                    value="{{ old('minimum_purchases', $coupon->minimum_purchases ?? '') }}">
                                @include('Backend.components.input-error-msg', [
                                    'inputName' => 'minimum_purchases',
                                ])
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-lg-4 col-form-label" for="expires_at">Discount expires at </label>
                            <div class="col-lg-8">
                                <input value="{{ old('expires_at', $coupon->expires_at ?? '') }}" type="date"
                                    class="form-control" name="expires_at" placeholder=""
                                    aria-label="Example text with button addon" aria-describedby="button-addon1">


                                @include('Backend.components.input-error-msg', [
                                    'inputName' => 'expires_at',
                                ])
                            </div>
                        </div>


                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">
                                {{ isset($coupon) ? 'update ' : 'save' }}
                            </button>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
