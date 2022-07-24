<template>
    <header class="mobile-navbar">
        <nav class="navbar" v-if="route().current('shop.*')">
            <div class="search-products-container">
                <i class="bi bi-search"></i>

                <input
                    type="text"
                    placeholder="search"
                    @keyup.enter="getSearchResults"
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

const getSearchResults = () => {
    if (search.value) {
        Inertia.get(
            route("shop.categoryPage", {
                category_slug: usePage().props.value.category.slug,
            }),
            {
                search: search.value,
            },
            {
                preserveState: true,
                replace: true,
            }
        );
    }
};
const clearSearchResults = () => {
    search.value = "";
    if (usePage().props.value.queryString.search) {
        Inertia.get(
            route("categoryPage", {
                category_slug: usePage().props.value.category.slug,
            })
        );
    }
};
</script>
