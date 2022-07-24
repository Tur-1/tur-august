<template>
    <div class="row d-flex justify-content-center">
        <ProductCard
            customClass="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-6 mb-3"
            :products="$page.props.products"
        />
    </div>
</template>

<script setup>
import ProductCard from "@/components/ProductCard.vue";
</script>
