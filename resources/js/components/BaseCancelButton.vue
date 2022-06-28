<script setup>
defineProps(["title"]);
defineEmits(["cancelRequest"]);
</script>

<template>
    <button type="button" class="cancel-btn" @click="$emit('cancelRequest')">
        {{ title }}
    </button>
</template>
