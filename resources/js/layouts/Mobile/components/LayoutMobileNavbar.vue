<template>
    <header class="mobile-navbar">
        <nav class="navbar">
            <!-- <SearchBox /> -->
            <Link v-show="backUrl" :href="backUrl">
                <i class="bi bi-chevron-left backurl-icon"></i>
            </Link>
            <span class="page-title" v-if="!route().current('shop.*')">
                {{ title }}
            </span>
        </nav>
    </header>
</template>
<script setup>
import SearchBox from "@/layouts/Mobile/components/SearchBox.vue";

defineProps({
    title: String,
    backUrl: String,
});
</script>
