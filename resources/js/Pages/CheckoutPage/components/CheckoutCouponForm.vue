
<template>

    <div class="card border-0 mt-3 mb-3">
        <div class="card-body ">
            <form wire:submit.prevent="ApplyCoupon" class="d-flex align-items-center">
                <input type="text" wire:model.defer="code" placeholder="Enter Coupon Code..."
                    class=" form-control form-control-sm" />

                <button class="text-primary bg-transparent ms-2" type="submit">
                    Apply
                </button>
            </form>
        </div>
    </div>
</template>