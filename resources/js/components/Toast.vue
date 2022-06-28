<template>
    <Transition name="slide-fade">
        <div
            v-if="isShown == true"
            id="toast-alert"
            class="align-items-center"
            role="alert"
            :class="toast.background"
            aria-live="assertive"
            aria-atomic="true"
        >
            <div class="d-flex">
                <div class="toast-body">{{ toast.message }}</div>
            </div>
        </div>
    </Transition>
</template>
<script setup>
import { ref, watch } from "vue";

const props = defineProps({
    toast: Object,
});

let isShown = ref(false);
watch(
    () => props.toast,
    (first) => {
        isShown.value = true;
        setTimeout(() => {
            isShown.value = false;
        }, 1500);
    }
);
</script>
<style>
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
