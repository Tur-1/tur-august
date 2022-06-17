<div class="card-body p-0">
    <label class="w-100" for="image-input-{{ $index }}" wire:loading.class='opacity-10'>

        <img class="card-image" src="{{ $image['image_url'] }}" style="min-height: 350px !important;">

    </label>
    <input type="file" class="form-control" id="image-input-{{ $index }}"
        wire:model="productImages.{{ $index }}.image_url" style="display: none;"
        name="productImages[{{ $index }}][image]">

</div>
