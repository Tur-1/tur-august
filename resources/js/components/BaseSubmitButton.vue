<script setup>
defineProps(["title", "formProcessing"]);
</script>

<template>
    <button type="submit" class="btn btn-primary" :disabled="formProcessing">
        {{ title }}
        <div
            class="spinner-border spinner-border-sm"
            role="status"
            v-if="formProcessing"
        >
            <span class="visually-hidden">Loading...</span>
        </div>
    </button>
</template>
