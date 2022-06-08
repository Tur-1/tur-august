<template>



    <Head>
        <title>August - {{ title }}</title>
    </Head>
    <Transition name="fade" mode="out-in">
        <main v-if="contentTrigger" :style="backgroundColor">
            <LayoutNavbar v-if="showDesktopLayout" />
            <LayoutMobileNavbar :title="title" v-if="showMobileLayout" />

            <slot />

            <LayoutFooter v-if="showDesktopLayout" />
            <LayoutMobileFooter v-if="showMobileLayout" />
        </main>
    </Transition>
</template>

<script setup>

import LayoutNavbar from "./components/LayoutNavbar";
import LayoutFooter from "./components/LayoutFooter";
import AlertMessage from "@/components/AlertMessage.vue";
import { onMounted, ref } from "vue";
import LayoutMobileNavbar from "@/layouts/Frontend/components/LayoutMobileNavbar.vue";
import LayoutMobileFooter from "@/layouts/Frontend/components/LayoutMobileFooter.vue";

const props = defineProps({
    backgroundColor: String,
    title: String,

})
let contentTrigger = ref(false);

let showDesktopLayout = ref(true);
let showMobileLayout = ref(false);



const mediaQueryWidth = window.matchMedia("(max-width: 756px)");


if (mediaQueryWidth.matches)
{
    showMobileLayout.value = true;
    showDesktopLayout.value = false;
}
onMounted(() =>
{
    contentTrigger.value = true;
})
</script>

 
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
 