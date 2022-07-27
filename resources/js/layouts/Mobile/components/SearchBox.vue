<template>
    <i
        class="bi bi-search search-bar-icon"
        v-if="route().current('homePage')"
        @click="openSearchModal"
    >
    </i>

    <div class="search-box" v-if="route().current('shop.*')">
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
    <div
        class="offcanvas offcanvas-end search-offcanvas"
        data-bs-backdrop="false"
        tabindex="-1"
        id="offcanvasScrolling"
        aria-labelledby="offcanvasScrollingLabel"
    >
        <div class="offcanvas-body"></div>
    </div>
</template>
<script setup>
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

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
