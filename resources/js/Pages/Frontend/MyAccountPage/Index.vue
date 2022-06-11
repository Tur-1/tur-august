<template>

    <app-layout title="Profile">
        <DesktopUi v-if="showDesktopUI" />
        <MobileUi v-if="showMobileUI" />
    </app-layout>
</template>
<script setup>
import AppLayout from "@/layouts/Frontend/AppLayout";
import DesktopUi from "@/Pages/Frontend/MyAccountPage/Desktop/DesktopUi.vue";
import MobileUi from "@/Pages/Frontend/MyAccountPage/Mobile/MobileUi.vue";
import { ref } from "vue";

let showMobileUI = ref(false);
let showDesktopUI = ref(true);


const mediaQueryWidth = window.matchMedia("(max-width: 756px)");


if (mediaQueryWidth.matches)
{
    showMobileUI.value = true;
    showDesktopUI.value = false;
}

</script>