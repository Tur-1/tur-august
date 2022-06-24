<template>
    <div class="mb-3">
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

        <InputErrorMsg v-if="errorMsg" :error="errorMsg" />
    </div>
</template>

<script setup>
import InputErrorMsg from "@/components/InputErrorMsg.vue";
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
