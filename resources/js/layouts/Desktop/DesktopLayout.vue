<script setup>
import LayoutNavbar from "./components/LayoutNavbar";
import LayoutFooter from "./components/LayoutFooter";
import { onMounted, ref } from "vue";
import AuthModal from "@/layouts/Desktop/components/AuthModal.vue";

defineProps({
    title: String,
});

let contentTrigger = ref(false);
onMounted(() => {
    contentTrigger.value = true;
});
</script>

<template>
    <LayoutNavbar />
    <main scroll-region>
        <Transition name="fade" mode="out-in">
            <slot v-if="contentTrigger" />
        </Transition>

        <AuthModal />
        <LayoutFooter />
    </main>
</template>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
