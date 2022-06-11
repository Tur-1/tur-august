<template>

    <div class="row mb-3 p-3">
        <div class="col-4">
            <div class="card border-0 mb-3 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <span class="card-title">Turki Alharbi</span>
                    <div>
                        <button class="bg-transparent border-0 btn-sm " wire:click.prevent="OpenEditAddressModal(3)">
                            <i class="fas fa-edit fa-lg"> </i>
                        </button>
                        <span class="border-start m-2"></span>
                        <button class="bg-transparent border-0 btn-sm " wire:click.prevent="OpenDeleteAddressModal(3)">
                            <i class="fas fa-trash fa-lg  "> </i>
                        </button>
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    <div class="row text-dark">
                        <span>
                            medina

                        </span>
                        <span>
                            medina

                        </span>
                        <span>
                            medina

                        </span>

                    </div>

                    <small class="text-secondary" style="font-size: 12px">
                        0552952593
                    </small>
                </div>
            </div>
        </div>

    </div>


    <div class="card border-0 mt-4 w-50 shadow-sm">
        <a role="button" class="card-body text-dark" wire:click.prevent="OpenNewAddressModal">
            <i class="fa-solid fa-circle-plus fa-lg me-2"></i>
            <span class="text-bold">Add new address</span>
        </a>
    </div>


</template>