<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import AccountPasswordForm from "./../../MyAccountSettings/AccountPassword/AccountPasswordForm.vue";
import BaseForm from "@/components/Base/BaseForm.vue";
import BaseModal from "@/components/Base/BaseModal.vue";
import { ref } from "vue";

let accountPasswordForm = useForm({
    current_password: "",
    new_password: "",
    new_password_confirmation: "",
});

let isPasswordModalOpen = ref(false);
// methods
const openAccountPasswordModal = () => {
    isPasswordModalOpen.value = true;
};
const updateAccountPassword = () => {
    accountPasswordForm.post(route("updateAccountPassword"), {
        onSuccess: (page) => {
            closeAccountPasswordModal();
        },
    });
};
const closeAccountPasswordModal = () => {
    isPasswordModalOpen.value = false;

    accountPasswordForm.reset().clearErrors();
};
</script>

<template>
    <div class="row mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div wire:id="8MbtLTrynBn0TDd3Bq0P">
                    <header
                        class="d-flex justify-content-between mb-2 align-items-center"
                    >
                        <span class="card-title text-dark"
                            ><strong>PASSWORD</strong></span
                        >
                        <button
                            class="bg-transparent border-0"
                            @click="openAccountPasswordModal"
                        >
                            <i class="bi bi-pencil-square"></i>
                        </button>
                    </header>
                </div>

                <input class="w-100 p-2" placeholder="*********" disabled="" />
            </div>
        </div>
    </div>

    <BaseModal
        id="account-password-modal"
        title="update account passwrod"
        :isModalOpen="isPasswordModalOpen"
        @closeModal="closeAccountPasswordModal"
    >
        <BaseForm
            submitButtonTitle="save changes"
            cancelButtonTitle="cancel"
            @formSubmited="updateAccountPassword"
            @cancelRequest="closeAccountPasswordModal"
            :formProcessing="accountPasswordForm.processing"
        >
            <AccountPasswordForm :accountPasswordForm="accountPasswordForm" />
        </BaseForm>
    </BaseModal>
</template>
