<template>
    <div
        class="auth-form-content tab-pane fade show active"
        id="login-form"
        role="tabpanel"
        aria-labelledby="home-tab"
    >
        <form @submit.prevent="login">
            <BaseInput
                label="Email *"
                v-model="loginForm.email"
                type="email"
                id="login_email"
                :customClass="{ 'is-invalid': loginForm.errors.email }"
                :errorMsg="loginForm.errors.email"
            />
            <BaseInput
                label="Password *"
                v-model="loginForm.password"
                type="password"
                id="login_password"
                :customClass="{ 'is-invalid': loginForm.errors.password }"
                :errorMsg="loginForm.errors.password"
            />

            <button
                type="submit"
                class="btn btn-primary w-100 mt-2"
                :disabled="loginForm.processing"
                name="sign_up"
            >
                sign in
                <div
                    class="spinner-border spinner-border-sm"
                    role="status"
                    v-if="loginForm.processing"
                >
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </form>
    </div>
</template>
<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import BaseInput from "@/components/BaseInput.vue";
let loginForm = useForm({
    email: "",
    password: "",
});

const login = () => {
    loginForm.post(route("login"));
};
</script>
