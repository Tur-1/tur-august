<template>
    <app-layout title="wishlist" v-if="showDesktopLayout">
        <Breadcrumb pageTitle="wishlist" />
        <section class="container">
            <WishlistHeader />
            <WishlistProducts />
        </section>
    </app-layout>

    <app-layout title="wishlist" v-if="showMobileLayout">
        <section class="container">
            <div class="text-start">
                <p class="text-uppercase">
                    {{ $page.props.wishlistCounter }} items
                </p>
            </div>
            <WishlistProducts />
        </section>
    </app-layout>
</template>

<script setup>
import AppLayout from "@/layouts/Frontend/AppLayout";
import WishlistHeader from "@/Pages/Frontend/WishlistPage/components/WishlistHeader.vue";
import WishlistProducts from "@/Pages/Frontend/WishlistPage/components/WishlistProducts";
import Breadcrumb from "@/components/Breadcrumb.vue";

import { ref } from "vue";

let showDesktopLayout = ref(true);
let showMobileLayout = ref(false);

const mediaQueryWidth = window.matchMedia("(max-width: 756px)");

if (mediaQueryWidth.matches) {
    showMobileLayout.value = true;
    showDesktopLayout.value = false;
}
</script>
