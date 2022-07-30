<template>
    <header class="mobile-header">
        <nav class="navigation">
            <div class="nav-back-button" :class="{ hidden: !backUrl }">
                <Link :href="backUrl">
                    <i class="bi bi-chevron-left"></i>
                </Link>
            </div>
            <span class="page-title" v-if="!route().current('shop.*')">
                {{ title }}
            </span>

            <SearchBar />
        </nav>
    </header>
</template>
<script setup>
import SearchBar from "@/components/SearchBar/index.vue";

defineProps({
    title: String,
    backUrl: String,
});
</script>
