<script setup>
import LayoutMobileNavbar from "@/layouts/Mobile/components/LayoutMobileNavbar.vue";
import LayoutMobileFooter from "@/layouts/Mobile/components/LayoutMobileFooter.vue";
import { onMounted, ref } from "vue";
import AuthOffcanvas from "@/layouts/Mobile/components/AuthOffcanvas.vue";

const props = defineProps({
    title: String,
    backUrl: String,
});

let contentTrigger = ref(false);
onMounted(() => {
    contentTrigger.value = true;
});
</script>

<template>
    <main scroll-region>
        <LayoutMobileNavbar :title="title" :backUrl="backUrl" />
        <Transition name="slide" mode="out-in">
            <slot v-if="contentTrigger" />
        </Transition>
        <AuthOffcanvas />

        <LayoutMobileFooter />
    </main>
</template>

<style>
.slide-enter-active,
.slide-leave-active {
    transition: all 0.25s ease-out;
}

.slide-enter-from {
    opacity: 0;
    transform: translateX(30px);
}
.slide-leave-to {
    opacity: 0;
    transform: translateX(-30px);
}
</style>
