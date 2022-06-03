
<template>
    <div class="tab-pane fade show active p-3" id="account-settings" role="tabpanel" aria-labelledby="home-tab">
        <div class="row p-3">
            <div class="col-md-7 ">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div wire:id="bzgUtuEANz79Q3V4AiwS">
                            <header class=" d-flex justify-content-between mb-2  align-items-center">
                                <span class="card-title text-dark"><strong>ACCOUNT INFO </strong></span>
                                <button class=" bg-transparent border-0" wire:click.prevent="OpenAccountInfoModal()">
                                    <i class="far fa-edit fa-lg"></i>

                                </button>
                            </header>

                            <div class="text-dark">
                                <span>Name :</span>
                                <p>Admin</p>

                                <span>Email :</span>
                                <p>admin@admin.com</p>

                                <span>Gender :</span>
                                <p>Female</p>
                            </div>





                        </div>

                        <!-- Livewire Component wire-end:bzgUtuEANz79Q3V4AiwS -->
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div wire:id="8MbtLTrynBn0TDd3Bq0P">
                                <header class=" d-flex justify-content-between mb-2  align-items-center">
                                    <span class="card-title text-dark"><strong>PASSWORD</strong></span>
                                    <button class=" bg-transparent border-0" wire:click.prevent="OpenPasswordModal">
                                        <i wire:loading.remove="" wire:target="OpenPasswordModal"
                                            class="far fa-edit fa-lg"></i>

                                    </button>
                                </header>

                            </div>

                            <input class="w-100 p-2" placeholder="*********" disabled="">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div wire:id="3XVzsGsO7yl4cn5avLBs">
                                <header class=" d-flex justify-content-between mb-2  align-items-center">
                                    <span class="card-title text-dark"><strong>PHONE NUMBER </strong></span>
                                    <button class=" bg-transparent border-0" wire:click.prevent="OpenPhoneNumberModal">
                                        <i wire:loading.remove="" wire:target="OpenPhoneNumberModal"
                                            class="far fa-edit  fa-lg"></i>

                                    </button>
                                </header>
                                <div class=" w-100 text-dark">
                                    <p>436345643 </p>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


</template>