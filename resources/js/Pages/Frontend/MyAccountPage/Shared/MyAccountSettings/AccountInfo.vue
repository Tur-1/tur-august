<template>
    <div class="row mb-1">
        <div class="card shadow-sm">
            <div class="card-body">
                <header class=" d-flex justify-content-between mb-2  align-items-center">
                    <span class="card-title text-dark"><strong>ACCOUNT INFO </strong></span>
                    <button class=" bg-transparent border-0" @click="openAccountInfoModal">
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
    <AccountModal modalId="account-info-modal" modalTitle="update account information "
        @closeAccountModal="hideAccountInfoModal">
        <AccountInfoForm :accountInfoForm="accountInfoForm" @updateAccountInfo="updateAccountInfo" />
    </AccountModal>

</template>
<script setup>

import { useForm } from "@inertiajs/inertia-vue3";
import AccountModal from "./AccountModal.vue";
import AccountInfoForm from "./Forms/AccountInfoForm.vue";

const props = defineProps({
    userInfo: Object,
})

let accountInfoForm = useForm({
    name: props.userInfo.name,
    email: props.userInfo.email,
    gender: props.userInfo.gender,
});

const openAccountInfoModal = () =>
{
    $("#account-info-modal").modal("show");
}
const updateAccountInfo = () =>
{
    accountInfoForm.post(route('updateAccountInformation'), {
        onSuccess: page =>
        {
            hideAccountInfoModal();

        }
    }
    );
}
const hideAccountInfoModal = () =>
{
    $("#account-info-modal").modal("hide");

    accountInfoForm.reset({
        name: props.userInfo.name,
        email: props.userInfo.email,
        gender: props.userInfo.gender,
    }).clearErrors();
}
</script>