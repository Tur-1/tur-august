<template>

    <app-layout title="My Account">
        <MyAccountDesktopView v-if="isDesktop" />
        <MyAccountMobileView v-if="isMobile" />
    </app-layout>
</template>
<script setup>
import AppLayout from "@/layouts/Frontend/AppLayout";
import { ref } from "vue";
import MyAccountDesktopView from "@/Pages/Frontend/MyAccountPage/views/Desktop/MyAccountDesktopView.vue";
import MyAccountMobileView from "@/Pages/Frontend/MyAccountPage/views/Mobile/MyAccountMobileView.vue";

let isMobile = ref(false);
let isDesktop = ref(true);


const mediaQueryWidth = window.matchMedia("(max-width: 756px)");


if (mediaQueryWidth.matches)
{
    isMobile.value = true;
    isDesktop.value = false;
}

</script>