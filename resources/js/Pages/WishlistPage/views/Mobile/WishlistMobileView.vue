<template>
    <app-layout title="wishlist">
        <section class="container">
            <WishlistHeader />
            <WishlistProducts />
        </section>
    </app-layout>
</template>
<script setup>
import AppLayout from "@/layouts/AppLayout";
import WishlistHeader from "@/Pages/WishlistPage/views/Mobile/components/WishlistHeader.vue";
import WishlistProducts from "@/Pages/WishlistPage/views/Mobile/components/WishlistProducts";
</script>
