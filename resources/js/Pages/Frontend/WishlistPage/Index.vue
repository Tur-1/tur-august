<template>
    <app-layout title="wishlist">
        <Breadcrumb pageTitle="wishlist" />
        <section class="container">
            <WishlistHeader />
            <WishlistProducts />
        </section>
    </app-layout>
</template>

<script setup>
import AppLayout from "@/layouts/Frontend/AppLayout";
import WishlistHeader from "@/Pages/Frontend/WishlistPage/components/WishlistHeader.vue";
import WishlistProducts from "@/Pages/Frontend/WishlistPage/components/WishlistProducts";
import Breadcrumb from "@/shared/Breadcrumb.vue";
</script>
