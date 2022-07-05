<template>
    <span v-show="message" class="text-danger" style="font-size: 12px">
        {{ message }}
    </span>
</template>
<script setup>
defineProps(["message"]);
</script>
