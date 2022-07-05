<script setup>
import AccountInformationForm from "./AccountInformationForm.vue";
import BaseFormModal from "@/components/Base/BaseFormModal.vue";
import { useForm } from "@inertiajs/inertia-vue3";
const props = defineProps({
    userInfo: Object,
});

let accountInfoForm = useForm({
    name: props.userInfo.name,
    email: props.userInfo.email,
    gender: props.userInfo.gender,
});

// action methods

const openAccountInfoModal = () => {
    $("#account-info-modal").modal("show");
};
const updateAccountInfo = () => {
    accountInfoForm.post(route("updateAccountInformation"), {
        onSuccess: (page) => {
            closeAccountInfoModal();
        },
    });
};

const closeAccountInfoModal = () => {
    $("#account-info-modal").modal("hide");

    accountInfoForm
        .reset({
            name: props.userInfo.name,
            email: props.userInfo.email,
            gender: props.userInfo.gender,
        })
        .clearErrors();
};
const cancelUpdateingAccountInfoRequest = () => {
    accountInfoForm.cancel();
    closeAccountInfoModal();
};
</script>
<template>
    <div class="row mb-1">
        <div class="card shadow-sm">
            <div class="card-body">
                <header
                    class="d-flex justify-content-between mb-2 align-items-center"
                >
                    <span class="card-title text-dark"
                        ><strong>ACCOUNT INFO </strong></span
                    >
                    <button
                        class="bg-transparent border-0"
                        @click="openAccountInfoModal"
                    >
                        <i class="bi bi-pencil-square"></i>
                    </button>
                </header>

                <div class="text-dark">
                    <span>Name :</span>
                    <p>{{ $page.props.user.name }}</p>

                    <span>Email :</span>
                    <p>{{ $page.props.user.email }}</p>

                    <span>Gender :</span>
                    <p>{{ $page.props.user.gender }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <BaseFormModal
        id="account-info-modal"
        title="update account information"
        submitButtonTitle="save changes"
        cancelButtonTitle="cancel"
        @formSubmited="updateAccountInfo"
        @cancelRequest="cancelUpdateingAccountInfoRequest"
        :formProcessing="accountInfoForm.processing"
    >
        <AccountInformationForm :accountInfoForm="accountInfoForm" />
    </BaseFormModal>
</template>
