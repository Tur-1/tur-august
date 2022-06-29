<script setup>
const porps = defineProps({
    id: String,
});
</script>
<template>
    <div
        class="offcanvas offcanvas-bottom base-bottom-offcanvas"
        tabindex="-1"
        :id="id"
        aria-labelledby="offcanvasBottomLabel"
    >
        <div class="offcanvas-header">
            <slot name="offcanvas-header"></slot>
        </div>
        <div class="offcanvas-body small">
            <slot name="offcanvas-body"></slot>
        </div>
    </div>
</template>
