<template>

    <header class="mobile-navbar">
        <nav class="navbar">

            <span class="page-title">{{ title }}</span>
        </nav>

    </header>
</template>
<script setup>
defineProps(['title'])
</script>