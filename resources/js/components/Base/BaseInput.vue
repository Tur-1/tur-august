<template>
    <div class="mb-1">
        <label :for="id" class="form-label">{{ label }}</label>
        <input
            class="form-control form-control-sm"
            :placeholder="placeholder"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            :type="type"
            :class="customClass"
            :id="id"
        />

        <BaseInputErrorMsg v-if="errorMsg" :message="errorMsg" />
    </div>
</template>

<script setup>
import BaseInputErrorMsg from "@/components/Base/BaseInputErrorMsg.vue";
defineProps([
    "modelValue",
    "type",
    "label",
    "id",
    "customClass",
    "errorMsg",
    "placeholder",
]);
</script>
