<template>
    <Head>
        <title>August - {{ title }}</title>
    </Head>

    <DesktopLayout :backgroundColor="backgroundColor" v-if="showDesktopLayout">
        <slot />
    </DesktopLayout>

    <MobileLayout
        :backgroundColor="backgroundColor"
        :title="title"
        v-if="showMobileLayout"
    >
        <slot />
    </MobileLayout>
</template>

<script setup>
import { ref } from "vue";
import DesktopLayout from "@/layouts/Desktop/DesktopLayout.vue";
import MobileLayout from "@/layouts/Mobile/MobileLayout.vue";

defineProps({
    backgroundColor: String,
    title: String,
    MobileSlot: String,
});

let showDesktopLayout = ref(true);
let showMobileLayout = ref(false);

const mediaQueryWidth = window.matchMedia("(max-width: 756px)");

if (mediaQueryWidth.matches) {
    showMobileLayout.value = true;
    showDesktopLayout.value = false;
}
</script>
