<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import AccountPhoneNumberForm from "@/Pages/MyAccountPage/components/MyAccountSettings/AccountPhoneNumber/AccountPhoneNumberForm.vue";
import BaseFormModal from "@/components/BaseFormModal.vue";

const props = defineProps({
    userPhoneNumber: Number,
});

let accountPhoneNumberForm = useForm({
    phone_number: props.userPhoneNumber,
});

const openAccountPhoneNumberModal = () => {
    $("#account-phone-number-modal").modal("show");
};
const updateAccountPhoneNumber = () => {
    accountPhoneNumberForm.post(route("updateAccountPhoneNumber"), {
        onSuccess: (page) => {
            hideAccountPhoneNumberModal();
        },
    });
};
const hideAccountPhoneNumberModal = () => {
    $("#account-phone-number-modal").modal("hide");
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

    <!-- Modal -->
    <BaseFormModal
        id="account-phone-number-modal"
        title="update account phone number"
        submitButtonTitle="save changes"
        cancelButtonTitle="cancel"
        @formSubmited="updateAccountPhoneNumber"
        @cancelRequest="hideAccountPhoneNumberModal"
        :formProcessing="accountPhoneNumberForm.processing"
    >
        <AccountPhoneNumberForm
            :accountPhoneNumberForm="accountPhoneNumberForm"
        />
    </BaseFormModal>
</template>
