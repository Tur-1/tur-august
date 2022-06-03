<template>
    <div class="mb-3">
        <div class="card border-0">
            <label class="user-address d-flex align-items-center flex-row m-0 p-0" for="address_id-0">
                <input wire:key="0" wire:model="address_id" class="form-check-input ms-3" type="radio" id="address_id-0"
                    value="3">
                <div class="d-flex justify-content-between align-items-center card-body ">
                    <div class="d-flex flex-column ">
                        <span class="card-title">Turki Alharbi</span>

                        <small class="text-secondary" style="font-size: 12px">
                            0552952593
                        </small>
                        <div class="row">
                            <span>
                                medina , 12dfx
                                ,medina
                            </span>
                        </div>
                    </div>
                </div>
            </label>
        </div>

        <div wire:id="4Nl6iXnl1E2WtJYC8atE">
            <button type="button" class="add-new-address card border-0 mt-4 w-100"
                wire:click.prevent="OpenNewAddressModal">
                <div class="card-body ">

                    <i class="fa-solid fa-circle-plus fa-lg me-2"></i>
                    <span class="text-bold">Add new address</span>
                </div>
            </button>
        </div>
    </div>
</template>