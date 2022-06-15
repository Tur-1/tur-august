<div>
    <input class="form-control" wire:model="selectedImage" name="{{ $inputName }}" type="file">
    <div class="card border-0 mt-3">

        <div wire:loading.remove class="card-body text-center">
            @if (!is_null($selectedImage))
                <img src="{{ $selectedImage->temporaryUrl() }}" alt="">
            @elseif(!is_null($imagePath))
                <img src="{{ $imagePath }}" alt="">
            @else
                <img src="{{ asset('assets/images/defult-input-image.png') }}" alt="">
            @endif
        </div>
        <div wire:loading
            wire:loading.class='card-body text-center d-flex justify-content-center align-items-center mt-5'
            wire:target='selectedImage'>
            <div class="d-flex flex-column ">
                <div class="spinner-border ms-4 mb-3 " role="status">

                </div>
                <h5 class="text-center">Loading...</h5>
            </div>
        </div>
    </div>



    <div class="m-2">
        @if ($errors->has('selectedImage'))
            <span class="error text-danger help-block  ">{{ $errors->first('selectedImage') }}</span>
        @endif


        @if ($errors->has($inputName))
            <span class="error text-danger help-block  ">{{ $errors->first($inputName) }}</span>
        @endif
    </div>

</div>
