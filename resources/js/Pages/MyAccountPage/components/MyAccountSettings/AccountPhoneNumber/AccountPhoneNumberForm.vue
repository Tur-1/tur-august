<template>
    <div class="mb-3">
        <div class="input-group input-group-sm">
            <span
                class="input-group-text d-flex justify-content-between"
                id="basic-addon1"
            >
                <img
                    src="https://flagcdn.com/w20/sa.png"
                    srcset="https://flagcdn.com/w40/sa.png 2x"
                    width="25"
                    alt="Saudi Arabia"
                />
                <span>+966</span>
            </span>
            <input
                v-model="accountPhoneNumberForm.phone_number"
                class="form-control form-control-sm"
                id="phone_number"
                :class="{
                    'is-invalid': accountPhoneNumberForm.errors.phone_number,
                }"
                type="tel"
                placeholder="51 234 5678"
            />
        </div>
        <BaseInputErrorMsg
            :error="accountPhoneNumberForm.errors.phone_number"
        />
    </div>
</template>

<script setup>
import BaseInputErrorMsg from "@/components/Base/BaseInputErrorMsg.vue";
defineProps({
    accountPhoneNumberForm: Object,
});

defineEmits(["updateAccountPhoneNumber"]);
</script>
