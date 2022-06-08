<template>
    <div class="col border-start">
        <button class="sort-filter-btns" data-bs-toggle="offcanvas" data-bs-target="#mobile-offcanvas-filter"
            aria-controls="offcanvasExample" type="button" id="mobile-offcanvas-filter-btn">
            <i class="bi bi-funnel-fill"></i>
            <span>Filter</span>
        </button>
    </div>

    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="mobile-offcanvas-filter"
        aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header mobile-offcanvas-filter-header">
            <span class="border-top"></span>
            <div class="header">
                <strong>Fliter</strong>
                <button class="clear-all-btn" type="button">clear All</button>
            </div>
        </div>
        <div class="offcanvas-body small mobile-offcanvas-filter-body">
            <ShopMobileCategories />
            <ShopMobileBrands :filters="filters" />
            <ShopMobileColors :filters="filters" />
            <ShopMobileSizeOptions :filters="filters" />
        </div>
        <div class="offcanvas-footer  sticky-bottom">
            <button type="button" class="filter-products-button btn btn-primary ">
                products
            </button>
        </div>
    </div>
</template>
 <script setup>
import ShopMobileCategories from '@/Pages/Frontend/ShopPage/components/MobileShopFilterItems/ShopMobileCategories.vue';
import ShopMobileBrands from '../MobileShopFilterItems/ShopMobileBrands.vue';
import ShopMobileColors from '../MobileShopFilterItems/ShopMobileColors.vue';
import ShopMobileSizeOptions from '../MobileShopFilterItems/ShopMobileSizeOptions.vue';

import { ref, watch } from "vue";
import getfilters from "@/Helpers/getFilters";




const props = defineProps({
    categorySlug: String,
    queryString: Object,
});

let colorsValues = props.queryString.color ?? [props.queryString.color];
let brandsValues = props.queryString.brand ?? [props.queryString.brand];
let sizeValues = props.queryString.sizeOptions ?? [props.queryString.sizeOptions];


let filters = ref({ brand: brandsValues, color: colorsValues, sizeOptions: sizeValues });

watch(filters, (checked) => getfilters(checked, props.categorySlug), {
    deep: true,
});
</script>