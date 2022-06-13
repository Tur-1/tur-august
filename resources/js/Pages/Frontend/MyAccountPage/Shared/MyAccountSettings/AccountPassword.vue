<template>
    <div class="row mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div wire:id="8MbtLTrynBn0TDd3Bq0P">
                    <header class=" d-flex justify-content-between mb-2  align-items-center">
                        <span class="card-title text-dark"><strong>PASSWORD</strong></span>
                        <button class=" bg-transparent border-0" wire:click.prevent="OpenPasswordModal">
                            <i wire:loading.remove="" wire:target="OpenPasswordModal" class="bi bi-pencil-square"></i>

                        </button>
                    </header>

                </div>

                <input class="w-100 p-2" placeholder="*********" disabled="">
            </div>
        </div>
    </div>
</template>