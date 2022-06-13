<script setup>
import LayoutMobileNavbar from "@/layouts/Frontend/Mobile/components/LayoutMobileNavbar.vue";
import LayoutMobileFooter from "@/layouts/Frontend/Mobile/components/LayoutMobileFooter.vue";
import CategoriesPage from "@/layouts/Frontend/Mobile/components/Categories/CategoriesPage.vue";
import { onMounted, ref } from "vue";



defineProps({
    backgroundColor: String,
    title: String,
});

let contentTrigger = ref(false);
onMounted(() =>
{
    contentTrigger.value = true;
});
</script>


<template>
    <Transition name="fade" mode="out-in">
        <main v-if="contentTrigger" :style="backgroundColor">
            <LayoutMobileNavbar :title="title" />

            <slot />

            <CategoriesPage />
            <LayoutMobileFooter />

        </main>
    </Transition>

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
