<template>
    <span v-show="error" class="text-danger" style="font-size: 12px">
        {{ error }}
    </span>
</template>
<script setup>
defineProps(["error"]);
</script>
