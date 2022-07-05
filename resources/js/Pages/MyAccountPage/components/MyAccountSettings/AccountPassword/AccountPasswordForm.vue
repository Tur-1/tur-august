<template>
    <BaseInput
        label="current password *"
        v-model="accountPasswordForm.current_password"
        type="password"
        id="accountCurrentPassword"
        :customClass="{
            'is-invalid': accountPasswordForm.errors.current_password,
        }"
        :errorMsg="accountPasswordForm.errors.current_password"
    />
    <BaseInput
        label="new password *"
        v-model="accountPasswordForm.new_password"
        type="password"
        id="accountNewPassword"
        :customClass="{ 'is-invalid': accountPasswordForm.errors.new_password }"
        :errorMsg="accountPasswordForm.errors.new_password"
    />
    <BaseInput
        label="confirm new password *"
        v-model="accountPasswordForm.new_password_confirmation"
        type="password"
        id="accountNewPasswordConfirmation"
        :customClass="{
            'is-invalid': accountPasswordForm.errors.new_password_confirmation,
        }"
        :errorMsg="accountPasswordForm.errors.new_password_confirmation"
    />
</template>

<script setup>
import BaseInput from "@/components/Base/BaseInput.vue";
defineProps({
    accountPasswordForm: Object,
});
</script>
