<template>
    <div class="col-xl-10 col-lg-10 col-md-9 col-sm-12 col-12">
        <div class="row">
            <ProductCard :products="$page.props.products.data" />
        </div>

        <Pagination
            :links="$page.props.products.links"
            v-if="$page.props.products.data.length > 13"
        />
    </div>
</template>
<script setup>
import Pagination from "@/shared/Pagination";

import ProductCard from "@/shared/ProductCard.vue";
</script>
