<template>
    <form @submit.prevent="$emit('updateAccountPassword')">
        <div class="mb-3">
            <label class="form-label">current password *</label>
            <input
                v-model="accountPasswordForm.current_password"
                class="form-control form-control-sm"
                :class="{
                    'is-invalid': accountPasswordForm.errors.current_password,
                }"
                type="password"
            />

            <InputErrorMsg
                :error="accountPasswordForm.errors.current_password"
            />
        </div>

        <div class="mb-3">
            <label class="form-label">new password *</label>
            <input
                v-model="accountPasswordForm.new_password"
                type="password"
                class="form-control form-control-sm"
                :class="{
                    'is-invalid': accountPasswordForm.errors.new_password,
                }"
            />

            <InputErrorMsg :error="accountPasswordForm.errors.new_password" />
        </div>
        <div class="mb-3">
            <label class="form-label">confirm new password *</label>
            <input
                v-model="accountPasswordForm.new_password_confirmation"
                type="password"
                class="form-control form-control-sm"
                :class="{
                    'is-invalid':
                        accountPasswordForm.errors.new_password_confirmation,
                }"
            />

            <InputErrorMsg
                :error="accountPasswordForm.errors.new_password_confirmation"
            />
        </div>

        <div class="text-end">
            <button
                type="button"
                class="btn btn-secondary me-2"
                data-bs-dismiss="modal"
            >
                Cancel
            </button>
            <button
                type="submit"
                class="btn btn-primary"
                :disabled="accountPasswordForm.processing"
            >
                update
                <div
                    class="spinner-border spinner-border-sm"
                    role="status"
                    v-if="accountPasswordForm.processing"
                >
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </div>
    </form>
</template>

<script setup>
import InputErrorMsg from "@/components/InputErrorMsg.vue";
defineProps({
    accountPasswordForm: Object,
});

defineEmits(["updateAccountPassword"]);
</script>
