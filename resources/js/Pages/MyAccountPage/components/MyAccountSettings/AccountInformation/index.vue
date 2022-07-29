<script setup>
import AccountInformationForm from "./AccountInformationForm.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import BaseModal from "@/components/Base/BaseModal.vue";
import BaseForm from "@/components/Base/BaseForm.vue";
import { ref } from "vue";
const props = defineProps({
    userInfo: Object,
});

let accountInfoForm = useForm({
    name: props.userInfo.name,
    email: props.userInfo.email,
    gender: props.userInfo.gender,
});

let isAccountInfoModalOpen = ref(false);
// action methods

const openAccountInfoModal = () => {
    isAccountInfoModalOpen.value = true;
};
const updateAccountInfo = () => {
    accountInfoForm.post(route("updateAccountInformation"), {
        onSuccess: (page) => {
            closeAccountInfoModal();
        },
    });
};

const closeAccountInfoModal = () => {
    isAccountInfoModalOpen.value = false;

    accountInfoForm
        .reset({
            name: props.userInfo.name,
            email: props.userInfo.email,
            gender: props.userInfo.gender,
        })
        .clearErrors();
};
const cancelUpdateingRequest = () => {
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
                    <p>
                        <span class="me-1">Name: </span>
                        {{ $page.props.user.name }}
                    </p>

                    <p>
                        <span class="me-1">Email: </span
                        >{{ $page.props.user.email }}
                    </p>

                    <p>
                        <span class="me-1">Gender: </span
                        >{{ $page.props.user.gender }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->

    <BaseModal
        id="account-info-modal"
        title="update account information"
        :isModalOpen="isAccountInfoModalOpen"
        @closeModal="cancelUpdateingRequest"
    >
        <BaseForm
            submitButtonTitle="save changes"
            cancelButtonTitle="cancel"
            @formSubmited="updateAccountInfo"
            @cancelRequest="cancelUpdateingRequest"
            :formProcessing="accountInfoForm.processing"
        >
            <AccountInformationForm :accountInfoForm="accountInfoForm" />
        </BaseForm>
    </BaseModal>
</template>
