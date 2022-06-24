<script setup>
defineProps(["title"]);
defineEmits(["cancelRequest"]);
</script>

<template>
    <button
        type="button"
        class="btn btn-secondary me-2"
        @click="$emit('cancelRequest')"
    >
        {{ title }}
    </button>
</template>
