<script setup>
import ShopDesktopProducts from "@/Pages/ShopPage/views/Desktop/components/ShopDesktopProducts.vue";
import ShopDesktopSidebar from "./components/ShopDesktopSidebar/index.vue";
import ShopDesktopHeader from "@/Pages/ShopPage/views/Desktop/components/ShopDesktopHeader/index.vue";
</script>
<template>
    <section class="container">
        <ShopDesktopHeader />
        <div class="row">
            <ShopDesktopSidebar
                :categorySlug="$page.props.category.slug"
                :queryString="$page.props.queryString"
            />
            <ShopDesktopProducts />
        </div>
    </section>
</template>
