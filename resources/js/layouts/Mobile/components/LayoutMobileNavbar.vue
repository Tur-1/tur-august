<template>
    <header class="mobile-navbar">
        <nav class="navbar" v-if="route().current('shopPage')">
            <div class="search-products-container">
                <i class="bi bi-search"></i>

                <input type="text" placeholder="search" />
            </div>
        </nav>
        <nav class="navbar" v-if="!route().current('shopPage')">
            <Link v-show="backUrl" :href="backUrl">
                <i class="bi bi-chevron-left backurl-icon"></i>
            </Link>
            <span class="page-title">{{ title }}</span>
        </nav>
    </header>
</template>
<script setup>
defineProps({
    title: String,
    backUrl: String,
});
</script>
