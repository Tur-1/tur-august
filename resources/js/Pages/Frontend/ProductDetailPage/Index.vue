<template>
    <app-layout title="jkdfh">
        <Breadcrumb :categories="$page.props.breadcrumb" :pageTitle="$page.props.productDetail.name" />
        <section class="container product-detail-container">

            <div class="row justify-content-center">
                <ProductImages />
                <ProductInformation />
            </div>

            <Tabs />
            <RelatedProducts />
        </section>
    </app-layout>
</template>

<script setup>
import AppLayout from "@/layouts/Frontend/AppLayout";
import Breadcrumb from "@/components/Breadcrumb";
import ProductImages from "@/Pages/Frontend/ProductDetailPage/components/ProductImages.vue";
import ProductInformation from "@/Pages/Frontend/ProductDetailPage/components/ProductInformation.vue";
import Tabs from "@/Pages/Frontend/ProductDetailPage/components/Tabs.vue";
import RelatedProducts from "@/Pages/Frontend/ProductDetailPage/components/RelatedProducts.vue";

</script>
