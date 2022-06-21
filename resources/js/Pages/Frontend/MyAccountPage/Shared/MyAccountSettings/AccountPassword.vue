<template>
    <div class="row mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div wire:id="8MbtLTrynBn0TDd3Bq0P">
                    <header class=" d-flex justify-content-between mb-2  align-items-center">
                        <span class="card-title text-dark"><strong>PASSWORD</strong></span>
                        <button class=" bg-transparent border-0" @click="openAccountPasswordModal">
                            <i class="bi bi-pencil-square"></i>

                        </button>
                    </header>

                </div>

                <input class="w-100 p-2" placeholder="*********" disabled="">
            </div>
        </div>
    </div>

    <!-- Modal -->
    <AccountModal modalId="account-password-modal" modalTitle="update account passwrod "
        @closeAccountModal="hideAccountPasswordModal">
        <AccountPasswordForm :accountPasswordForm="accountPasswordForm"
            @updateAccountPassword="updateAccountPassword" />
    </AccountModal>

</template>
<script setup>

import { useForm } from "@inertiajs/inertia-vue3";
import AccountModal from "./AccountModal.vue";
import AccountPasswordForm from "./Forms/AccountPasswordForm.vue";


let accountPasswordForm = useForm({
    current_password: '',
    new_password: '',
    new_password_confirmation: '',
});

const openAccountPasswordModal = () =>
{
    $("#account-password-modal").modal("show");
}
const updateAccountPassword = () =>
{
    accountPasswordForm.post(route('updateAccountPassword'), {
        onSuccess: page =>
        {
            hideAccountPasswordModal();

        }
    }
    );
}
const hideAccountPasswordModal = () =>
{
    $("#account-password-modal").modal("hide");

    accountPasswordForm.reset().clearErrors();
}
</script>