<div class="position-relative">
    <div class="row mb-3">
        <label class="col-lg-3 col-form-label" for="name">Sections</label>
        <div class="col-lg-9">

            <select class="form-select" wire:model.lazy='selectedSection' name="section_id">
                <option value=""> select section </option>
                @foreach ($sections as $section)
                    <option value="{{ $section['id'] }}">{{ $section['name'] }}</option>
                @endforeach

            </select>
            <div class="row">
                @include('Backend.components.input-error-msg', [
                    'inputName' => 'section_id',
                ])
            </div>

        </div>

    </div>

    <div class="row mb-3">
        <label class="col-lg-3 col-form-label" for="name">categories</label>
        <div class="col-lg-9">
            <select class="form-select" name="category_id" wire:model.defer='selectedCategory'>
                <option value=""> select category </option>
                @if ($selectedSection)
                    @include('livewire.Backend.components.category.categories', [
                        'categories' => $categories,
                    ])
                @endif
            </select>
            <div class="row">
                @include('Backend.components.input-error-msg', [
                    'inputName' => 'category_id',
                ])
            </div>
        </div>

    </div>
    @include('Backend.components.loading')
</div>
