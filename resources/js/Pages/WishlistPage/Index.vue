<template>
    <WishlistMobileView v-if="isMobile" />
    <WishlistDesktopView v-if="isDektop" />
</template>
<script setup>
import { ref } from "vue";
import WishlistMobileView from "@/Pages/WishlistPage/views/Mobile/WishlistMobileView.vue";
import WishlistDesktopView from "@/Pages/WishlistPage/views/Desktop/WishlistDesktopView.vue";

let isDektop = ref(true);
let isMobile = ref(false);

const mediaQueryWidth = window.matchMedia("(max-width: 756px)");

if (mediaQueryWidth.matches) {
    isMobile.value = true;
    isDektop.value = false;
}
</script>
