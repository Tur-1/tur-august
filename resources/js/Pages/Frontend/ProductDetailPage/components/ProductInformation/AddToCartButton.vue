<template lang="">
    <div class="cart-btn-wrraper">
        <button
            wire:loading.attr="disabled"
            wire:click.prevent="addToCart"
            class="btn btn-primary cart-btn"
        >
            <span
                wire:loading.remove=""
                wire:target="addToCart"
                class="text-light"
                >Add to cart</span
            >
        </button>
    </div>
</template>
