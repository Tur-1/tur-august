<template>
    <div class="search-box" v-show="route().current('homePage')">
        <i class="bi bi-search" @click="openSearchModal"></i>
        <div class="search-input">
            <input
                type="text"
                placeholder="search"
                @keyup.enter="getSearchResults"
                @click="openSearchModal"
                v-model="search"
            />
            <i class="bi bi-x-lg" @click="clearSearchResults"></i>
        </div>
    </div>

    <ShopSearchBar
        v-if="route().current('shop.*')"
        v-model="search"
        @openSearchModal="openSearchModal"
        @clearSearchResults="clearSearchResults"
    />
    <SearchBox />
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import ShopSearchBar from "@/components/SearchBar/ShopSearchBar.vue";
import SearchBox from "@/components/SearchBar/SearchBox.vue";

let search = ref(
    usePage().props.value.queryString
        ? usePage().props.value.queryString.search
        : ""
);
const openSearchModal = () => {
    $(".collapse").collapse("show");
    $(".search-box").addClass("show-box");
    $(".search-input").addClass("show-input");
    $(".page-title").addClass("hide");
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
    $(".collapse").collapse("hide");
    $(".search-box").removeClass("show-box");
    $(".search-input").removeClass("show-input");
    $(".page-title").removeClass("hide");
};
</script>
