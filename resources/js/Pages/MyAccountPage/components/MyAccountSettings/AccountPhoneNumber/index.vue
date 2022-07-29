<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import AccountPhoneNumberForm from "@/Pages/MyAccountPage/components/MyAccountSettings/AccountPhoneNumber/AccountPhoneNumberForm.vue";
import { ref } from "vue";
import BaseModal from "@/components/Base/BaseModal.vue";
import BaseForm from "@/components/Base/BaseForm.vue";

const props = defineProps({
    userPhoneNumber: Number,
});
let isPhoneNumberModalOpen = ref(false);
let accountPhoneNumberForm = useForm({
    phone_number: props.userPhoneNumber,
});

const openAccountPhoneNumberModal = () => {
    isPhoneNumberModalOpen.value = true;
};
const updateAccountPhoneNumber = () => {
    accountPhoneNumberForm.post(route("updateAccountPhoneNumber"), {
        onSuccess: (page) => {
            closeAccountPhoneNumberModal();
        },
    });
};
const closeAccountPhoneNumberModal = () => {
    isPhoneNumberModalOpen.value = false;
    accountPhoneNumberForm
        .reset({ phone_number: props.userPhoneNumber })
        .clearErrors();
};
</script>

<template>
    <div class="row mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <header
                    class="d-flex justify-content-between mb-2 align-items-center"
                >
                    <span class="card-title text-dark"
                        ><strong>PHONE NUMBER </strong></span
                    >
                    <button
                        class="bg-transparent border-0"
                        @click="openAccountPhoneNumberModal"
                    >
                        <i class="bi bi-pencil-square"></i>
                    </button>
                </header>
                <div class="w-100 text-dark">
                    <p>{{ userPhoneNumber ?? "No phone number saved" }}</p>
                </div>
            </div>
        </div>
    </div>

    <BaseModal
        id="account-phone-number-modal"
        title="update account phone number"
        :isModalOpen="isPhoneNumberModalOpen"
        @closeModal="closeAccountPhoneNumberModal"
    >
        <BaseForm
            submitButtonTitle="save changes"
            cancelButtonTitle="cancel"
            @formSubmited="updateAccountPhoneNumber"
            @cancelRequest="closeAccountPhoneNumberModal"
            :formProcessing="accountPhoneNumberForm.processing"
        >
            <AccountPhoneNumberForm
                :accountPhoneNumberForm="accountPhoneNumberForm"
            />
        </BaseForm>
    </BaseModal>
</template>
