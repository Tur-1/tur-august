<template>
    <div class="search-box" v-show="route().current('homePage')">
        <i class="bi bi-search" @click="openSearchModal"></i>

        <div class="search-input">
            <input type="text" placeholder="search" v-model="search" />
            <i class="bi bi-x-lg" @click="clearSearchResults"></i>
        </div>
    </div>

    <ShopSearchBar
        v-if="route().current('shop.*')"
        v-model="search"
        @openSearchModal="openSearchModal"
        @clearSearchResults="clearSearchResults"
    />
    <SearchBox :isShown="isShown" />
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-vue3";
import { ref, watch } from "vue";
import ShopSearchBar from "@/components/SearchBar/ShopSearchBar.vue";
import SearchBox from "@/components/SearchBar/SearchBox.vue";
import debounce from "lodash/debounce";

let isShown = ref(false);

let progress = ref(false);

let search = ref(
    usePage().props.value.queryString
        ? usePage().props.value.queryString.search
        : ""
);
const openSearchModal = () => {
    isShown.value = true;

    $(".search-box").addClass("show-box");
    $(".search-input").addClass("show-input");
    $(".page-title").addClass("hide");
};

const clearSearchResults = () => {
    search.value = "";

    isShown.value = false;
    $(".search-box").removeClass("show-box");
    $(".search-input").removeClass("show-input");
    $(".page-title").removeClass("hide");
};

watch(
    search,

    debounce(function (value) {
        if (value !== "") {
            Inertia.post(
                route("shop.searchProducts"),
                { search: value },
                {
                    preserveState: true,
                    preserveScroll: true,
                }
            );
        }
    }, 400)
);
</script>
