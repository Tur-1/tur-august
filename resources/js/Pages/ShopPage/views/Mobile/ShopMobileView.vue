<script setup>
import Pagination from "@/components/Pagination";
import ProductCard from "@/components/ProductCard.vue";
import ShopMobileHeader from "@/Pages/ShopPage/views/Mobile/components/ShopMobileHeader/index.vue";
</script>
<template>
    <section>
        <ShopMobileHeader />
        <div class="container">
            <div class="row">
                <ProductCard :products="$page.props.products.data" />
            </div>
            <Pagination
                :links="$page.props.products.meta.links"
                v-if="
                    $page.props.products.meta.total >
                    $page.props.products.meta.per_page
                "
            />
            <div
                v-show="$page.props.productsCount == 0"
                class="justify-content-center text-center"
            >
                <h5>No Products Found</h5>
            </div>
        </div>
    </section>
</template>
