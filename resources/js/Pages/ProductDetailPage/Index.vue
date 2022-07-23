<template>
    <app-layout
        :title="$page.props.productDetail.name"
        :backUrl="$page.props.previousPageUrl"
    >
        <Breadcrumb
            v-if="showDesktopLayout"
            :categories="$page.props.breadcrumb"
            :pageTitle="$page.props.productDetail.name"
        />
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
import { ref } from "vue";
import AppLayout from "@/layouts/AppLayout";
import Breadcrumb from "@/components/Breadcrumb";
import ProductImages from "@/Pages/ProductDetailPage/components/ProductImages/index.vue";
import ProductInformation from "@/Pages/ProductDetailPage/components/ProductInformation/index.vue";
import RelatedProducts from "@/Pages/ProductDetailPage/components/RelatedProducts/index.vue";
import Tabs from "@/Pages/ProductDetailPage/components/Tabs/index.vue";

let showDesktopLayout = ref(true);

const mediaQueryWidth = window.matchMedia("(max-width: 756px)");

if (mediaQueryWidth.matches) {
    showDesktopLayout.value = false;
}
</script>
