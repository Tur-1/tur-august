<template>
    <Head>
        <title>August - {{ title }}</title>
    </Head>

    <DesktopLayout v-if="isDesktop">
        <slot />
    </DesktopLayout>

    <MobileLayout :title="title" :backUrl="backUrl" v-if="isMobile">
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
    title: String,
    backUrl: String,
});

let isDesktop = ref(true);
let isMobile = ref(false);

const mediaQueryWidth = window.matchMedia("(max-width: 756px)");

if (mediaQueryWidth.matches) {
    isMobile.value = true;
    isDesktop.value = false;
}
</script>
