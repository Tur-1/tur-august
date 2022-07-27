<script setup>
import { onMounted, ref } from "vue";
import LayoutMobileNavbar from "@/layouts/Mobile/components/LayoutMobileNavbar.vue";
import LayoutMobileFooter from "@/layouts/Mobile/components/LayoutMobileFooter.vue";
import AuthMobile from "@/layouts/Mobile/components/AuthMobile.vue";

defineProps({
    title: String,
    backUrl: String,
});

let contentTrigger = ref(false);
onMounted(() => {
    contentTrigger.value = true;
});
</script>

<template>
    <LayoutMobileNavbar :title="title" :backUrl="backUrl" />

    <Transition name="slide" mode="out-in">
        <main scroll-region v-if="contentTrigger">
            <slot />
        </main>
    </Transition>

    <LayoutMobileFooter />
    <AuthMobile />
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
