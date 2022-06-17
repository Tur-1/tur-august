<div class="position-relative ">
    <div class="content">

        @include('livewire.backend.components.product.product-images.components.add-new-image-button')

        @if (!empty($productImages))
            <div class="row">
                @foreach ($productImages as $index => $image)
                    <div class="col-md-3">
                        <div class="card">
                            @include('livewire.backend.components.product.product-images.components.image-card-body')
                            @include('livewire.backend.components.product.product-images.components.image-card-footer')
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>


    {{-- confirm delete Image modal --}}
    @include('livewire.backend.components.product.product-images.components.confirm-modal')

    @include('Backend.components.loading')
</div>


@push('script')
    <script>
        window.addEventListener('openDeleteProductImageModal', (e) => {
            $("#delete-product-image-modal").modal('show');

        });
        window.addEventListener('closeDeleteProductImageModal', (e) => {
            $("#delete-product-image-modal").modal('hide');
            $("#images").addClass("show");
        });

        window.addEventListener('openUpdateProductImageModal', (e) => {
            $("#update-product-image-modal").modal('show');

        });
        window.addEventListener('closeUpdateProductImageModal', (e) => {
            $("#update-product-image-modal").modal('hide');
            $("#images").addClass("show");

        });
    </script>
@endpush
