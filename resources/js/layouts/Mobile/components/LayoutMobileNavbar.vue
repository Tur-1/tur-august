<template>
    <header class="mobile-navbar">
        <nav>
            <div class="nav-back-button">
                <Link :href="backUrl">
                    <i class="bi bi-chevron-left" v-show="backUrl"></i>
                </Link>
            </div>
            <span class="page-title" v-if="!route().current('shop.*')">
                {{ title }}
            </span>

            <SearchBox />
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
