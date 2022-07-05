<template>
    <Head>
        <title>August - {{ title }}</title>
    </Head>

    <DesktopLayout :backgroundColor="backgroundColor" v-if="isDesktop">
        <slot />
    </DesktopLayout>

    <MobileLayout
        :backgroundColor="backgroundColor"
        :title="title"
        v-if="isMobile"
    >
        <slot />
    </MobileLayout>
    <Toast />
</template>

<script setup>
import { ref } from "vue";
import DesktopLayout from "@/layouts/Desktop/DesktopLayout.vue";
import MobileLayout from "@/layouts/Mobile/MobileLayout.vue";
import Toast from "@/components/Toast.vue";

defineProps({
    backgroundColor: String,
    title: String,
});

let isDesktop = ref(true);
let isMobile = ref(false);

const mediaQueryWidth = window.matchMedia("(max-width: 756px)");

if (mediaQueryWidth.matches) {
    isMobile.value = true;
    isDesktop.value = false;
}
</script>
