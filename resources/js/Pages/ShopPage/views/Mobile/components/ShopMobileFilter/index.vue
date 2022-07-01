<script setup>
import ShopMobileCategories from "@/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileCategories.vue";
import ShopMobileBrands from "@/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileBrands.vue";
import ShopMobileColors from "@/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileColors.vue";
import ShopMobileSizeOptions from "@/Pages/ShopPage/views/Mobile/components/ShopMobileFilter/ShopMobileSizeOptions.vue";

import useProductsFilters from "@/Pages/ShopPage/Helpers/useProductsFilters";

const props = defineProps({
    categorySlug: String,
    queryString: Object,
});
const {
    filters,
    clearProductsFilters,
    getFilteredProducts,
    removeFilteredValue,
} = useProductsFilters(props.queryString);

const showFilteredProducts = () => {
    getFilteredProducts(props.categorySlug);
};
const closeMobileOffcanvasFilter = () => {
    $("#mobile-offcanvas-filter").offcanvas("hide");

    showFilteredProducts();
};
</script>

<template>
    <div class="col border-start">
        <button
            class="sort-filter-btns"
            data-bs-toggle="offcanvas"
            data-bs-target="#mobile-offcanvas-filter"
            aria-controls="offcanvasExample"
            type="button"
            id="mobile-offcanvas-filter-btn"
        >
            <i class="bi bi-funnel-fill"></i>
            <span>Filter</span>
        </button>
    </div>

    <div
        class="offcanvas offcanvas-bottom"
        tabindex="-1"
        id="mobile-offcanvas-filter"
        aria-labelledby="offcanvasBottomLabel"
    >
        <div class="offcanvas-header mobile-offcanvas-filter-header">
            <span class="border-top"></span>
            <div class="header">
                <strong>Fliter</strong>
                <button
                    class="clear-all-btn"
                    type="button"
                    @click="clearProductsFilters(props.categorySlug)"
                >
                    clear All
                </button>
            </div>
        </div>
        <div class="offcanvas-body small mobile-offcanvas-filter-body">
            <ShopMobileBrands
                :filters="filters"
                :removeFilteredValue="removeFilteredValue"
                :showFilteredProducts="showFilteredProducts"
            />
            <ShopMobileColors
                :filters="filters"
                :removeFilteredValue="removeFilteredValue"
                :showFilteredProducts="showFilteredProducts"
            />
            <ShopMobileSizeOptions
                :filters="filters"
                :removeFilteredValue="removeFilteredValue"
                :showFilteredProducts="showFilteredProducts"
            />
        </div>
        <div class="offcanvas-footer mobile-offcanvas-filter-footer">
            <button
                type="button"
                class="filter-products-button btn btn-primary"
                @click="closeMobileOffcanvasFilter"
            >
                ({{ $page.props.productsCount }}) products
            </button>
        </div>
    </div>
</template>
