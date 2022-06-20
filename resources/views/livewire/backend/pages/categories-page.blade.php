<div class="card position-relative">
    <div class="card-header">
        <div class="col-lg-3">
            <select wire:model="selectedSection" class="form-select " id="section_slug">
                <option value="">
                    select section
                </option>
                @foreach ($sections as $section)
                    <option value="{{ $section['id'] }}">
                        {{ $section['name'] }}
                    </option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="card-body">
        <div class=" table table-responsive">
            <table id="example" class="table table-striped table-hover " style="width:100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>image</th>
                        <th>name</th>
                        <th>section</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody wire:loading.remove>
                    @if (!empty($categoriesSection) || count($categoriesSection) > 0)
                        @include('Backend.pages.categories.components.section-row')
                    @endif
                    @if (count($categories) > 0)
                        @include('Backend.pages.categories.components.categories', [
                            'categories' => $categories,
                        ])
                    @else
                        <tr>
                            <td colspan="5">
                                <h4 class="text-center">No Categories Found</h4>
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>

    </div>
    @include('Backend.components.loading')
</div>
