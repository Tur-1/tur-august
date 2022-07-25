<template>
    <header class="mobile-navbar">
        <nav class="navbar" v-if="route().current('shop.*')">
            <Link v-show="backUrl" :href="backUrl">
                <i class="bi bi-chevron-left backurl-icon"></i>
            </Link>
            <div class="search-products-container">
                <i class="bi bi-search"></i>

                <input
                    type="text"
                    placeholder="search"
                    @keyup.enter="getSearchResults"
                    @click="openSearchModal"
                    v-model="search"
                />
                <i class="bi bi-x-lg" @click="clearSearchResults"></i>
            </div>
        </nav>
        <nav class="navbar" v-if="!route().current('shop.*')">
            <Link v-show="backUrl" :href="backUrl">
                <i class="bi bi-chevron-left backurl-icon"></i>
            </Link>
            <span class="page-title">{{ title }}</span>
        </nav>
    </header>

    <div
        class="offcanvas offcanvas-end search-offcanvas"
        data-bs-backdrop="false"
        tabindex="-1"
        id="offcanvasScrolling"
        aria-labelledby="offcanvasScrollingLabel"
    >
        <div class="offcanvas-body">
            <p>
                Try scrolling the rest of the page to see this option in action.
            </p>
        </div>
    </div>
</template>
<script setup>
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

defineProps({
    title: String,
    backUrl: String,
});
let search = ref(
    usePage().props.value.queryString
        ? usePage().props.value.queryString.search
        : ""
);
const openSearchModal = () => {
    $("#offcanvasScrolling").offcanvas("show");
};
const getSearchResults = () => {
    // if (search.value) {
    //     Inertia.get(
    //         route("shop.categoryPage", {
    //             category_slug: usePage().props.value.category.slug,
    //         }),
    //         {
    //             search: search.value,
    //         },
    //         {
    //             preserveState: true,
    //             replace: true,
    //         }
    //     );
    // }
};
const clearSearchResults = () => {
    search.value = "";
    // if (usePage().props.value.queryString.search) {
    //     Inertia.get(
    //         route("shop.categoryPage", {
    //             category_slug: usePage().props.value.category.slug,
    //         })
    //     );
    // }
    $("#offcanvasScrolling").offcanvas("hide");
};
</script>
