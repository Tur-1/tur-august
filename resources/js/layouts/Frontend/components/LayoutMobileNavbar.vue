<template>

    <header class="mobile-navbar">
        <nav class="navbar">
            <i class="bi bi-chevron-left"></i>
            <span class="page-title">{{ title }}</span>
        </nav>

    </header>
</template>
<script setup>
defineProps(['title'])
</script>