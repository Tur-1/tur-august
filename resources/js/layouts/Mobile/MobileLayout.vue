<script setup>
import LayoutMobileNavbar from "@/layouts/Mobile/components/LayoutMobileNavbar.vue";
import LayoutMobileFooter from "@/layouts/Mobile/components/LayoutMobileFooter.vue";
import CategoriesPage from "@/layouts/Mobile/components/Categories/CategoriesPage.vue";
import { onMounted, ref } from "vue";
import AuthOffcanvas from "@/layouts/Mobile/components/AuthOffcanvas.vue";

const props = defineProps({
    backgroundColor: String,
    title: String,
});

let contentTrigger = ref(false);
onMounted(() => {
    contentTrigger.value = true;
});
</script>

<template>
    <main :style="backgroundColor">
        <LayoutMobileNavbar :title="title" />
        <Transition name="slide" mode="out-in">
            <slot v-if="contentTrigger" />
        </Transition>
        <AuthOffcanvas />
        <CategoriesPage />
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
