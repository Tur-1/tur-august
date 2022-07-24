<template>
    <form @submit.prevent="$emit('formSubmited')" class="p-2">
        <slot />
        <div class="cancel-submit-btns mt-4">
            <BaseCancelButton
                v-if="cancelButtonTitle"
                :title="cancelButtonTitle"
                @cancelRequest="$emit('cancelRequest')"
            />

            <BaseSubmitButton
                v-if="submitButtonTitle"
                :title="submitButtonTitle"
                :formProcessing="formProcessing"
            />
        </div>
    </form>
</template>
<script setup>
import BaseSubmitButton from "@/components/Base/BaseSubmitButton.vue";
import BaseCancelButton from "@/components/Base/BaseCancelButton.vue";
const porps = defineProps([
    "submitButtonTitle",
    "cancelButtonTitle",
    "formProcessing",
]);
const emit = defineEmits(["formSubmited", "cancelRequest"]);
</script>
