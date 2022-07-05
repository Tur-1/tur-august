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
            :links="$page.props.products.meta.links"
            v-if="$page.props.productsCount > 1"
        />
        <div
            v-show="$page.props.productsCount == 0"
            class="justify-content-center text-center"
        >
            <h5>No Products Found</h5>
        </div>
    </section>
</template>
