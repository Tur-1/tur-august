<template>
    <span v-show="error" class="text-danger">
        {{ error }}
    </span>
</template>
<script setup>

defineProps(['error'])
</script>