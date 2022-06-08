<template >
    <div class="mobile-shop-page-header">

        <div class="row border  text-center m-0">
            <MobileSortProducts />
            <MobileShopFilter :categorySlug="$page.props.category.slug" :queryString="$page.props.queryString" />
        </div>
        <MobileHeaderCategories />

    </div>
</template>

<script setup>
import MobileSortProducts from '@/Pages/Frontend/ShopPage/components/MobileShopHeader/MobileSortProducts.vue';
import MobileShopFilter from './MobileShopFilter.vue';
import MobileHeaderCategories from '@/Pages/Frontend/ShopPage/components/MobileShopHeader/MobileHeaderCategories.vue';
</script>