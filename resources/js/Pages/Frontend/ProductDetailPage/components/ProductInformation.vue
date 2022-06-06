<template >
    <div class="col-lg-5 col-md-6">
        <div class="row">
            <div class="product-detail-info">
                <Brand />
                <Title />
                <Price />
                <QualityInfo />
            </div>

            <ProductSizeOptions />
            <div class="add-product-warp">
                <AddToCartButton />
                <AddToWshlistButton />
            </div>

        </div>
    </div>
</template>
<script setup>

import Brand from "@/Pages/Frontend/ProductDetailPage/components/product-inforamtion/Brand.vue";
import Title from "@/Pages/Frontend/ProductDetailPage/components/product-inforamtion/Title.vue";
import Price from "@/Pages/Frontend/ProductDetailPage/components/product-inforamtion/Price.vue";
import QualityInfo from "@/Pages/Frontend/ProductDetailPage/components/product-inforamtion/QualityInfo.vue";
import AddToCartButton from "@/Pages/Frontend/ProductDetailPage/components/product-inforamtion/AddToCartButton.vue";
import AddToWshlistButton from "@/Pages/Frontend/ProductDetailPage/components/product-inforamtion/AddToWshlistButton.vue";
import ProductSizeOptions from "@/Pages/Frontend/ProductDetailPage/components/product-inforamtion/ProductSizeOptions.vue";



</script>
