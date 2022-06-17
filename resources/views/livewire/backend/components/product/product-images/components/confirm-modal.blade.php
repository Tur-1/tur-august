@if ($showConfirmModal)
    <div wire:ignore.self class="modal fade" id="delete-product-image-modal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                    <button wire:click.prevent='closeDeleteProductImageModal' type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete Image ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal"
                        wire:click.prevent='closeDeleteProductImageModal'>Close</button>
                    <button type="button" wire:click.prevent="destroyProductImage()" class="btn btn-danger btn-md"
                        data-bs-dismiss="modal">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
@endif
