<template>
    <Transition name="slide-fade">
        <div
            v-if="isShown && toast !== null"
            id="toast-alert"
            :class="toast.background"
            class="toast show align-items-center border-0"
            role="alert"
            aria-live="assertive"
            aria-atomic="true"
        >
            <div class="d-flex">
                <div class="toast-body">{{ toast.message }}</div>
                <button
                    type="button"
                    class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast"
                    aria-label="Close"
                ></button>
            </div>
        </div>
    </Transition>
</template>
<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { computed, onMounted, ref, watch } from "vue";

let toast = ref(computed(() => usePage().props.value.toast));

let isShown = ref(false);
onMounted(() => {
    if (toast.value !== null) {
        isShown.value = true;

        setTimeout(() => {
            isShown.value = false;
        }, 3500);
    }
});
watch(
    () => toast.value,
    (first) => {
        isShown.value = true;

        setTimeout(() => {
            isShown.value = false;
        }, 3500);
    }
);
</script>
<style scoped>
.slide-fade-enter-active {
    transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.4s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateX(20px);
    opacity: 0;
}
</style>
