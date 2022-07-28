<script setup>
const porps = defineProps({
    id: String,
    title: String,
});
defineEmits(["cancelRequest"]);
</script>
<template>
    <div
        class="offcanvas offcanvas-bottom base-bottom-offcanvas"
        tabindex="-1"
        :id="id"
        aria-labelledby="offcanvasBottomLabel"
    >
        <div class="offcanvas-header">
            <button
                type="button"
                class="border-0 bg-transparent"
                data-bs-dismiss="offcanvas"
                @click="$emit('cancelRequest')"
                aria-label="Close"
            >
                <i class="bi bi-chevron-down"></i>
            </button>
            <div class="text-center">
                <h5>{{ title }}</h5>
            </div>
            <div></div>
        </div>
        <div class="offcanvas-body small">
            <slot />
        </div>
    </div>
</template>
