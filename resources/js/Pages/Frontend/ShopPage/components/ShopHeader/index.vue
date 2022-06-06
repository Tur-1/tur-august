<template >
    <div class="desktop-shop-page-header">

        <div class=" d-flex align-items-center mb-2">
            <CurrentCategoryName />
            <div class="col-lg-10">
                <div class="d-flex justify-content-between align-items-center">
                    <ShopPageBreadcrumb />
                    <SortProducts />
                </div>
            </div>
        </div>

        <div class="text-start text-dark d-flex align-content-center" style="font-size: 11px">
            <div class="me-5">
                <i class="bi bi-caret-left-fill" style="font-size: 9px"></i>
                <a id="catalog_return " class="ms-1 text-dark" title="Home" href="/">
                    Back To Home
                </a>
            </div>
            <span class="items">{{ $page.props.products.data.length }} styles</span>
        </div>

        <hr class="mt-0 mb-0" />
    </div>
</template>

<script setup>
import CurrentCategoryName from "./CurrentCategoryName";
import ShopPageBreadcrumb from "./ShopPageBreadcrumb";
import SortProducts from "./SortProducts";

</script>
