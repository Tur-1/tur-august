<script setup>
import Pagination from "@/components/Pagination";
import ProductCard from "@/components/ProductCard.vue";
import ShopMobileHeader from "@/Pages/ShopPage/views/Mobile/components/ShopMobileHeader/index.vue";
</script>
<template>
    <ShopMobileHeader />

    <section class="container">
        <div class="row">
            <ProductCard :products="$page.props.products.data" />
        </div>
        <Pagination
            :links="$page.props.products.links"
            v-if="$page.props.products.data.length > 13"
        />
    </section>
</template>
