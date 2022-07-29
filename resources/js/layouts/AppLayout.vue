<template>
    <Head>
        <title>
            August {{ title && title !== "August" ? " - " + title : "" }}
        </title>
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
import { ref, onMounted } from "vue";
import DesktopLayout from "@/layouts/Desktop/DesktopLayout.vue";
import MobileLayout from "@/layouts/Mobile/MobileLayout.vue";
import Toast from "@/components/Toast.vue";

const props = defineProps({
    title: String,
    backUrl: String,
    backgroundColor: String,
});

let isDesktop = ref(true);
let isMobile = ref(false);

const mediaQueryWidth = window.matchMedia("(max-width: 756px)");

if (mediaQueryWidth.matches) {
    isMobile.value = true;
    isDesktop.value = false;
}
onMounted(() => {
    if (props.backgroundColor) {
        document.querySelector("body").classList.remove("app-bg-primary");
        document.querySelector("body").classList.add(props.backgroundColor);
    } else {
        document.querySelector("body").classList.remove(props.backgroundColor);
        document.querySelector("body").classList.add("app-bg-primary");
    }
});
</script>
