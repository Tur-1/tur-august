<template>
    <div class="mb-3">
        <label :for="id" class="form-label">{{ label }}</label>

        <select
            class="form-select form-select-sm"
            :class="customClass"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            :id="id"
        >
            <option
                v-for="(option, index) in options"
                :key="index"
                :value="option"
            >
                {{ option }}
            </option>
        </select>
        <InputErrorMsg v-if="errorMsg" :error="errorMsg" />
    </div>
</template>

<script setup>
import InputErrorMsg from "@/components/InputErrorMsg.vue";
defineProps([
    "modelValue",
    "id",
    "customClass",
    "label",
    "errorMsg",
    "options",
]);
</script>
