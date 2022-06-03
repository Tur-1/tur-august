
<template>

    <div class="card border-0 mt-3 mb-3">
        <div class="card-body ">
            <form wire:submit.prevent="ApplyCoupon" class=" p-0">
                <div class="input-group ">
                    <input type="text" wire:model.defer="code" placeholder="Enter Coupon Code..." class=" form-control">

                    <button wire:loading.attr="disabled" wire:traget="ApplyCoupon" class="btn btn-primary  "
                        type="submit" id="button-addon2">

                        <span wire:loading.remove="" wire:target="ApplyCoupon">
                            Apply</span>

                    </button>
                </div>
            </form>
        </div>
    </div>
</template>