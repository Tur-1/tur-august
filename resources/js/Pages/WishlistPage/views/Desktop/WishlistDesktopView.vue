<template>
    <app-layout title="wishlist">
        <section>
            <Breadcrumb pageTitle="wishlist" />
            <div class="container">
                <WishlistHeader />
                <WishlistProducts />
            </div>
        </section>
    </app-layout>
</template>
<script setup>
import AppLayout from "@/layouts/AppLayout";
import WishlistHeader from "@/Pages/WishlistPage/views/Desktop/components/WishlistHeader.vue";
import WishlistProducts from "@/Pages/WishlistPage/views/Desktop/components/WishlistProducts";
import Breadcrumb from "@/components/Breadcrumb.vue";
</script>
