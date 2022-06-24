<script setup>
import AppLayout from "@/layouts/AppLayout";
import ShopMobileView from "@/Pages/ShopPage/views/Mobile/ShopMobileView.vue";
import ShopDesktopView from "@/Pages/ShopPage/views/Desktop/ShopDesktopView.vue";
import { ref } from "vue";

let showDesktopLayout = ref(true);
let showMobileLayout = ref(false);

const mediaQueryWidth = window.matchMedia("(max-width: 756px)");

if (mediaQueryWidth.matches) {
    showMobileLayout.value = true;
    showDesktopLayout.value = false;
}
</script>
<template>
    <app-layout :title="$page.props.category.name">
        <ShopMobileView v-if="showMobileLayout" />
        <ShopDesktopView v-if="showDesktopLayout" />
    </app-layout>
</template>
