<template>

    <div class="auth-form-content tab-pane fade show active" id="login-form" role="tabpanel" aria-labelledby="home-tab">
        <form @submit.prevent="login">

            <div class="mb-3">
                <div class="form-floating ">
                    <input class="form-control form-control-sm " :class="loginForm.errors.email ? 'is-invalid' : ''"
                        type="email" id="email" placeholder="Email" autocomplete="email" v-model="loginForm.email">
                    <label for="email">Email </label>
                </div>

                <span v-if="loginForm.errors.email" class="text-danger">
                    {{ loginForm.errors.email }}
                </span>
            </div>
            <div class="mb-3">
                <div class="form-floating">
                    <input type="password" class="form-control " id="password" placeholder="Password"
                        :class="loginForm.errors.email ? 'is-invalid' : ''" v-model="loginForm.password">
                    <label for="password">Password</label>
                </div>

                <span v-if="loginForm.errors.password" class="text-danger">
                    {{ loginForm.errors.password }}
                </span>
            </div>

            <button type="submit" class="btn btn-primary w-100" :disabled="loginForm.processing" name="sign_up">
                sign in
                <div class="spinner-border spinner-border-sm" role="status" v-if="loginForm.processing">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </form>
    </div>
</template>
<script setup>

import { useForm } from "@inertiajs/inertia-vue3";
let loginForm = useForm({
    email: '',
    password: '',
});

const login = () =>
{
    loginForm.post(route('login'));
}
</script>