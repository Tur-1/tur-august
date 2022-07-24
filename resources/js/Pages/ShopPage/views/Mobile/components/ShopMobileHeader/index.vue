<template>
    <div class="mobile-shop-page-header">
        <ShopMobileSort />
        <ShopMobileFilter
            :categorySlug="$page.props.category.slug"
            :queryString="$page.props.queryString"
        />
    </div>
    <ShopMobileHeaderCategories />
</template>

<script setup>
import ShopMobileSort from "@/Pages/ShopPage/views/Mobile/components/ShopMobileHeader/ShopMobileSort.vue";
import ShopMobileFilter from "@/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/index.vue";
import ShopMobileHeaderCategories from "@/Pages/ShopPage/views/Mobile/components/ShopMobileHeader/ShopMobileHeaderCategories.vue";
</script>
