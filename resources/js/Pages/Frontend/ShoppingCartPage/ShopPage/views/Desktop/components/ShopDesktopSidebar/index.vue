
<template>

    <div class="shop-sidebar col-lg-2 col-md-3">
        <ShopDesktopSidebarCategories />
        <ShopDesktopSidebarBrands :filters="filters" />
        <ShopDesktopSidebarColors :filters="filters" />
        <ShopDesktopSidebarSizeOptions :filters="filters" />

    </div>
</template>

<script setup>
import { watch } from "vue";
import ShopDesktopSidebarCategories from "@/Pages/Frontend/ShopPage/views/Desktop/components/ShopDesktopSidebar/ShopDesktopSidebarCategories.vue";
import ShopDesktopSidebarBrands from "@/Pages/Frontend/ShopPage/views/Desktop/components/ShopDesktopSidebar/ShopDesktopSidebarBrands.vue";
import ShopDesktopSidebarColors from "@/Pages/Frontend/ShopPage/views/Desktop/components/ShopDesktopSidebar/ShopDesktopSidebarColors.vue";
import ShopDesktopSidebarSizeOptions from "@/Pages/Frontend/ShopPage/views/Desktop/components/ShopDesktopSidebar/ShopDesktopSidebarSizeOptions.vue";
import useProductsFilters from '@/Pages/Frontend/ShopPage/Helpers/useProductsFilters';


const props = defineProps({
    categorySlug: String,
    queryString: Object,
});


const { filters, getFilteredProducts } = useProductsFilters(props.queryString);

watch(filters, (checked) => getFilteredProducts(props.categorySlug), {
    deep: true,
});
</script>