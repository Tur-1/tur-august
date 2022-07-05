<template>
    <span v-show="message" class="text-primary" style="font-size: 12px">
        {{ message }}
    </span>
</template>
<script setup>
defineProps(["message"]);
</script>
