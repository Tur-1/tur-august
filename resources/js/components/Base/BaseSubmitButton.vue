<script setup>
defineProps(["title", "formProcessing"]);
</script>

<template>
    <button type="submit" class="submit-btn" :disabled="formProcessing">
        {{ title }}
        <div
            class="spinner-border spinner-border-sm ms-2"
            role="status"
            v-if="formProcessing"
        >
            <span class="visually-hidden">Loading...</span>
        </div>
    </button>
</template>
