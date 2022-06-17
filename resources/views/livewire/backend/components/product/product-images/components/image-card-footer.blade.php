<div class="card-footer p-2">
    <div class="d-flex justify-content-between align-items-center">
        <div class="form-check d-flex flex-row align-items-center">

            <input wire:key="{{ $index }}" wire:change="changeMainImage({{ $index }},{{ $image['id'] }})"
                class="form-check-input me-1" type="radio"
                @if (is_null($image['id'])) name="productImages[{{ $index }}][is_main_image]" @endif
                id="is-main-image-{{ $image['id'] }}" value="{{ $image['is_main_image'] }}"
                @checked($image['is_main_image'] == true)>
            <label class="form-check-label" for="is-main-image-{{ $image['id'] }}">
                <span> main image</span>
            </label>




        </div>
        <button wire:click.prevent="openDeleteProductImageModal({{ $index }},{{ $image['id'] }})"
            type="button" class="btn border ps-1 pt-0 pb-0 pe-1">
            <i class="bi bi-trash text-danger"></i>

        </button>
    </div>
    @include('Backend.components.input-error-msg', [
        'inputName' => 'productImages.' . $index . '.image',
    ])
</div>
