<template>
    <div class="col-lg-5 col-md-6 product-deatil-information">
        <div class="product-detail-info">
            <Brand />
            <Title />
            <Price />
            <QualityInfo />
        </div>

        <div v-if="$page.props.productDetail.in_stock">
            <ProductSizeOptions />
            <div class="add-product-warp">
                <AddToCartButton />
                <AddToWshlistButton />
            </div>
        </div>
        <div v-if="!$page.props.productDetail.in_stock">
            <div class="alert alert-danger w-100 text-center">
                <span>out of stock</span>
            </div>
        </div>
    </div>
</template>
<script setup>
import Brand from "@/Pages/ProductDetailPage/components/ProductInformation/Brand.vue";
import Title from "@/Pages/ProductDetailPage/components/ProductInformation/Title.vue";
import Price from "@/Pages/ProductDetailPage/components/ProductInformation/Price.vue";
import QualityInfo from "@/Pages/ProductDetailPage/components/ProductInformation/QualityInfo.vue";
import AddToCartButton from "@/Pages/ProductDetailPage/components/ProductInformation/AddToCartButton.vue";
import AddToWshlistButton from "@/Pages/ProductDetailPage/components/ProductInformation/AddToWshlistButton.vue";
import ProductSizeOptions from "@/Pages/ProductDetailPage/components/ProductInformation/ProductSizeOptions.vue";
</script>
