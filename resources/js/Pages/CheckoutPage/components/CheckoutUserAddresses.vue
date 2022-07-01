<template>
    <div class="mb-3">
        <div class="card border-0">
            <label
                class="user-address d-flex align-items-center flex-row m-0 p-0"
                for="address_id-0"
            >
                <input
                    wire:key="0"
                    wire:model="address_id"
                    class="form-check-input ms-3"
                    type="radio"
                    id="address_id-0"
                    value="3"
                />
                <div
                    class="d-flex justify-content-between align-items-center card-body"
                >
                    <div class="d-flex flex-column">
                        <span class="card-title">Turki Alharbi</span>

                        <small class="text-secondary" style="font-size: 12px">
                            0552952593
                        </small>
                        <div class="row">
                            <span> medina , 12dfx ,medina </span>
                        </div>
                    </div>
                </div>
            </label>
        </div>

        <div class="row mb-3 d-flex justify-content-center">
            <div class="border-top border-bottom mt-4 p-2 text-center">
                <a role="button" @click="$emit('openMyAddressBookModal')">
                    <span class="text-bold"> new address</span>
                </a>
            </div>
        </div>
    </div>
</template>
