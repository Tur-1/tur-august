<div class=" card">
    <div class="card-body table-responsive">
        <table class="table" id="products_table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col" class="fs-6">size</th>
                    <th scope="col" class="fs-6">stock</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($inputFields as $index => $input)
                    <tr scope="row">
                        <td>
                            {{ $index + 1 }}
                        </td>
                        <td>
                            <select
                                class="form-select {{ $errors->has('inputFields.' . $index . '.size_id') ? 'is-invalid' : '' }}"
                                wire:model.debounce.500ms='inputFields.{{ $index }}.size_id'
                                name="inputFields[{{ $index }}][size_id]">

                                <option value="">-- choose size --</option>
                                @foreach ($size_options as $id => $size_name)
                                    <option value="{{ $id }}"> {{ $size_name }}</option>
                                @endforeach

                            </select>

                            @include('Backend.components.input-error-msg', [
                                'inputName' => 'inputFields.' . $index . '.size_id',
                            ])

                        </td>
                        <td>

                            <input wire:model.debounce.500ms='inputFields.{{ $index }}.stock'
                                name="inputFields[{{ $index }}][stock]" type="number"
                                class="form-control {{ $errors->has('inputFields.' . $index . '.stock') ? 'is-invalid' : ' ' }}"
                                placeholder="In stock">

                            @include('Backend.components.input-error-msg', [
                                'inputName' => 'inputFields.' . $index . '.stock',
                            ])
                        </td>


                        <td>
                            <button wire:click.prevent="openDeleteSizeModal({{ $index }}, {{ $input['id'] }})"
                                wire:loading.attr='disabled' wire:target='RemoveInputField'
                                class="bg-transparent border-0 text-danger">
                                <small>Delete</small>
                            </button>
                        </td>
                    </tr>
                @endforeach
                <tr scope="row">
                    <td colspan="3">
                        <div wire:loading wire:target='addNewInput'
                            wire:loading.class="d-flex justify-content-center text-center">
                            <div class="spinner-border " role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>


        <button type="button"class="btn btn-primary" wire:click.prevent="addNewInput" wire:loading.attr='disabled'
            wire:target='AddInputField'>
            <i class="bi bi-plus-circle"></i>
            new size
        </button>

    </div>

    @if ($showModal)
        <div wire:ignore.self class="modal fade" tabindex="-1" id="size-option-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title"> Delete Confirm</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are You Sure Want to Delete Product size?</p>
                    </div>
                    <div class="modal-footer">
                        <button style="padding: 5px 10px; " type="button" class="btn btn-secondary "
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"
                            wire:click.prevent="destroySizeOption()">
                            Yes, Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@push('script')
    <script>
        window.addEventListener('openDeleteSizeModal', () => {
            $("#size-option-modal").modal('show');

        });
        window.addEventListener('closeDeleteSizeModal', () => {
            $("#size-option-modal").modal('hide');


        });
    </script>
@endpush
