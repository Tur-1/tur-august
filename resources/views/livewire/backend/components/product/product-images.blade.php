<div class="position-relative ">
    <div class="content" wire:loading.class='opacity-10'>
        <div class="content-header">
            <button wire:click.prevent='addNewImage' class="btn btn-primary" id="addNewImageBtn">
                <i class="bi bi-plus-circle"></i>
                new image
            </button>
        </div>


        @if (!empty($productImages))
            <div class="row">
                @foreach ($productImages as $index => $productImage)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body p-0">
                                <label class="w-100" for="image-input-{{ $index }}"
                                    wire:loading.class='opacity-10'>

                                    <img class="card-image" src="{{ $productImage['image_url'] }}"
                                        style="min-height: 350px !important;">

                                </label>
                                <input wire:model="productImages.{{ $index }}.image" class="form-control"
                                    style="display: none;" id="image-input-{{ $index }}"
                                    name="productImages[{{ $index }}][image]" type="file">

                                <div wire:loading
                                    wire:loading.class='card-img-overlay d-flex justify-content-center align-items-center '
                                    wire:target='productImages.{{ $index }}.image'>
                                    <div class="d-flex flex-column ">
                                        <div class="spinner-border ms-4 mb-3 " role="status">
                                        </div>
                                        <h5 class="text-center">Loading...</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer p-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-check d-flex flex-row align-items-center">
                                        <input type="radio" name="productImages[{{ $index }}][is_main_image]"
                                            class="form-check-input me-1" id="is-main-image-{{ $index }}"
                                            wire:click="changeMainImage({{ $index }} , {{ $productImage['id'] }})"
                                            value="{{ $productImage['is_main_image'] }}"
                                            @checked($productImage['is_main_image'] == true)>

                                        <label class="form-check-label" for="is-main-image-{{ $index }}">
                                            <span> main image</span>
                                        </label>
                                    </div>
                                    <button
                                        wire:click.prevent="openDeleteProductImageModal({{ $index }},{{ $productImage['id'] }})"
                                        type="button" class="btn btn-danger ps-1 pt-0 pb-0 pe-1">
                                        <i class="bi bi-trash "></i>

                                    </button>
                                </div>
                                @include('Backend.components.input-error-msg', [
                                    'inputName' => 'productImages.' . $index . '.image',
                                ])
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div wire:loading
        wire:loading.class='position-absolute top-50 end-50 translate-middle d-flex justify-content-center align-items-center '
        wire:target='addNewImage'>
        <div class="d-flex flex-column ">
            <div class="spinner-border ms-4 mb-3 " role="status">

            </div>
            <h5 class="text-center">Loading...</h5>
        </div>
    </div>
</div>
