<template>
    <div class="desktop-shop-page-header">
        <div class="row">
            <CurrentCategoryName />
            <div class="col-lg-10">
                <div class="d-flex justify-content-between align-items-center">
                    <ShopDesktopBreadcrumb />
                    <ShopDesktopSort />
                </div>
            </div>
        </div>
        <div class="text-start text-dark" style="font-size: 12px">
            <i class="bi bi-caret-left-fill"></i>
            <Link
                v-if="$page.props.previousCategory.length == 0"
                id="catalog_return"
                class="text-dark"
                title="Home"
                :href="route('homePage')"
            >
                Back To Home
            </Link>
            <Link
                v-else="$page.props.previousCategory.length == 1"
                id="catalog_return"
                class="text-dark"
                :title="$page.props.previousCategory.name"
                :href="previousCategory.link"
            >
                Back To {{ $page.props.previousCategory.name }}
            </Link>
        </div>

        <hr class="mt-0 mb-0" />
    </div>
</template>

<script setup>
import CurrentCategoryName from "@/Pages/ShopPage/views/Desktop/components/ShopDesktopHeader/CurrentCategoryName.vue";
import ShopDesktopBreadcrumb from "@/Pages/ShopPage/views/Desktop/components/ShopDesktopHeader/ShopDesktopBreadcrumb.vue";
import ShopDesktopSort from "@/Pages/ShopPage/views/Desktop/components/ShopDesktopHeader/ShopDesktopSort.vue";
</script>
