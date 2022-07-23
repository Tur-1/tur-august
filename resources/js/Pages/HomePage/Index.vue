<template>
    <app-layout title="Home">
        <section class="container home-container">
            <LargeBanners />
            <MediumBanners />

            <LatestProducts />
        </section>
    </app-layout>
</template>

<script setup>
import AppLayout from "@/layouts/AppLayout";
import LargeBanners from "@/Pages/HomePage/components/LargeBanners.vue";
import MediumBanners from "@/Pages/HomePage/components/MediumBanners.vue";
import LatestProducts from "@/Pages/HomePage/components/LatestProducts.vue";
</script>
