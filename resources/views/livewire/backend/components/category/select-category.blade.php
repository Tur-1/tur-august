<div>
    <div class="row mb-3">
        <label class="col-lg-3 col-form-label" for="name">Sections</label>
        <div class="col-lg-9">

            <select class="form-select" wire:model='selectedSection' name="section_id">
                <option value=""> select section </option>
                @foreach ($sections as $section)
                    <option value="{{ $section['id'] }}">{{ $section['name'] }}</option>
                @endforeach

            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-lg-3 col-form-label" for="name">categories</label>
        <div class="col-lg-9">
            <div wire:loading wire:loading.class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <select wire:loading.remove class="form-select" name="category_id">
                <option value=""> select category </option>
                @include('livewire.Backend.components.category.categories', [
                    'categories' => $categories,
                ])
            </select>
        </div>
    </div>
</div>
