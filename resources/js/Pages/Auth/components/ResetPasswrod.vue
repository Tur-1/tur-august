<template>
    <div class="tab-pane fade" id="ResetPassword" role="tabpanel">
        <div class="text-center">
            <span class="text-dark">Reset Password</span>

            <div class="mt-3 mb-3">
                <BaseInputSuccessMsg :message="successMsg" />
            </div>
        </div>

        <div class="p-1">
            <form @submit.prevent="sendPasswordResetLink">
                <BaseInput
                    label="E-Mail Address *"
                    v-model="sendPasswordResetLinkForm.email"
                    type="email"
                    id="reset_email"
                    :customClass="{
                        'is-invalid': sendPasswordResetLinkForm.errors.email,
                    }"
                    :errorMsg="sendPasswordResetLinkForm.errors.email"
                />
                <div class="mt-3 mb-2 text-center">
                    <button
                        type="submit"
                        class="btn btn-primary"
                        :disabled="sendPasswordResetLinkForm.processing"
                    >
                        Send Password Reset Link
                        <div
                            v-show="sendPasswordResetLinkForm.processing"
                            class="ms-2 spinner-border spinner-border-sm"
                            role="status"
                        >
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="m-2 text-end">
        <a href="#" role="button" class="text-dark" @click="tabShow">
            Forgot password?
        </a>
    </div>
</template>
<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import BaseInput from "@/components/Base/BaseInput.vue";
import { ref } from "vue";
import BaseInputSuccessMsg from "@/components/Base/BaseInputSuccessMsg.vue";

let sendPasswordResetLinkForm = useForm({
    email: "",
});
let successMsg = ref("");

const sendPasswordResetLink = () => {
    sendPasswordResetLinkForm.post(route("password.email"), {
        onSuccess: (page) => {
            successMsg.value = "We have emailed your password reset link!";
        },
    });
};
const tabShow = () => {
    let content = document.querySelectorAll(".auth-form-content");
    let headTabs = [...document.querySelectorAll(".auth-head-tab")];

    let ResetPassword = document.getElementById("ResetPassword");
    content.forEach((index) => {
        index.classList.remove("show", "active");
    });
    headTabs.forEach((index) => {
        [...index.children].forEach((tab) => {
            tab.classList.remove("active");
        });
    });
    ResetPassword.classList.add("show", "active");
};
</script>
