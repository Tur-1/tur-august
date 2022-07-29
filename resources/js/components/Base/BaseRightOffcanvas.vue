<script setup>
const porps = defineProps({
    id: String,
    title: String,
});
</script>
<template>
    <div
        class="offcanvas offcanvas-end base-right-offcanvas"
        tabindex="-1"
        :id="id"
        aria-labelledby="staticBackdropLabel"
    >
        <div class="offcanvas-header">
            <button
                type="button"
                class="close-offcanvas-btn"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
            >
                <i class="bi bi-chevron-left"></i>
            </button>

            <span class="page-title" :id="'staticBackdropLabel-' + id">
                {{ title }}
            </span>
        </div>
        <div class="offcanvas-body bg-light">
            <slot />
        </div>
    </div>
</template>
