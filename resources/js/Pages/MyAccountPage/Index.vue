<template>
    <app-layout title="My Account">
        <MyAccountDesktopView v-if="isDesktop" />
        <MyAccountMobileView v-if="isMobile" />
    </app-layout>
</template>
<script setup>
import AppLayout from "@/layouts/AppLayout";
import { onMounted, ref } from "vue";
import MyAccountDesktopView from "@/Pages/MyAccountPage/views/Desktop/MyAccountDesktopView.vue";
import MyAccountMobileView from "@/Pages/MyAccountPage/views/Mobile/MyAccountMobileView.vue";

let isMobile = ref(false);
let isDesktop = ref(true);

const mediaQueryWidth = window.matchMedia("(max-width: 756px)");

if (mediaQueryWidth.matches) {
    isMobile.value = true;
    isDesktop.value = false;
}
onMounted(() => {
    document.querySelector("body").style.backgroundColor = "#F9F9F9";
});
</script>
