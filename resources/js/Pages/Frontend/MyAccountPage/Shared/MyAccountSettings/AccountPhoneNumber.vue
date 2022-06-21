<template>
    <div class="row mb-3">
        <div class="card shadow-sm">
            <div class="card-body">

                <header class=" d-flex justify-content-between mb-2  align-items-center">
                    <span class="card-title text-dark"><strong>PHONE NUMBER </strong></span>
                    <button class=" bg-transparent border-0" @click="openAccountPhoneNumberModal">
                        <i class="bi bi-pencil-square"></i>

                    </button>
                </header>
                <div class=" w-100 text-dark">
                    <p>{{ userPhoneNumber ?? 'No phone number saved' }} </p>
                </div>

            </div>
        </div>

    </div>
    <!-- Modal -->
    <AccountModal modalId="account-phone-number-modal" modalTitle="update phone number"
        @closeAccountModal="hideAccountPhoneNumberModal">
        <AccountPhoneNumberForm :accountPhoneNumberForm='accountPhoneNumberForm'
            @updateAccountPhoneNumber="updateAccountPhoneNumber" />

    </AccountModal>

</template>
<script setup>

import { useForm } from "@inertiajs/inertia-vue3";
import AccountModal from "./AccountModal.vue";
import AccountPhoneNumberForm from "@/Pages/Frontend/MyAccountPage/Shared/MyAccountSettings/Forms/AccountPhoneNumberForm.vue";

const props = defineProps({
    userPhoneNumber: Number,
})

let accountPhoneNumberForm = useForm({
    phone_number: props.userPhoneNumber,

});

const openAccountPhoneNumberModal = () =>
{
    $("#account-phone-number-modal").modal("show");
}
const updateAccountPhoneNumber = () =>
{
    accountPhoneNumberForm.post(route('updateAccountPhoneNumber'), {
        onSuccess: page =>
        {
            hideAccountPhoneNumberModal();
        }
    }
    );
}
const hideAccountPhoneNumberModal = () =>
{
    $("#account-phone-number-modal").modal("hide");
    accountPhoneNumberForm.reset({ phone_number: props.userPhoneNumber }).clearErrors();
}
</script>