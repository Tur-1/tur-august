<template lang="">
    <div class="attr-size">
        <strong class="me-3">Size</strong>
        <ul class="size-filter">
            <li
                wire:ignore=""
                wire:click.prevent="getSelectedSize(1)"
                id="size-1"
                class="mb-1 me-1"
            >
                <span>S</span>
            </li>
        </ul>
    </div>
</template>
