<template>
    <div class="col-xl-10 col-lg-10 col-md-9 col-sm-12 col-12">
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
</template>
<script setup>
import Pagination from "@/components/Pagination";

import ProductCard from "@/components/ProductCard.vue";
</script>
