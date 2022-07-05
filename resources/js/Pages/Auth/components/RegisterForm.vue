<template>
    <div
        class="auth-form-content tab-pane fade"
        id="register-form"
        role="tabpanel"
        aria-labelledby="register-form-tab"
    >
        <form @submit.prevent="register">
            <BaseInput
                label="Name *"
                v-model="form.register_name"
                type="text"
                id="register_name"
                :customClass="{ 'is-invalid': form.errors.register_name }"
                :errorMsg="form.errors.email"
            />
            <BaseInput
                label="Email *"
                v-model="form.register_email"
                type="email"
                id="register_email"
                :customClass="{ 'is-invalid': form.errors.register_email }"
                :errorMsg="form.errors.register_email"
            />
            <BaseInput
                label="Password *"
                v-model="form.register_password"
                type="password"
                id="register_password"
                :customClass="{ 'is-invalid': form.errors.register_password }"
                :errorMsg="form.errors.register_password"
            />
            <BaseInput
                label="confirm password *"
                v-model="form.password_confirmation"
                type="password"
                id="password_confirmation"
                :customClass="{
                    'is-invalid': form.errors.password_confirmation,
                }"
                :errorMsg="form.errors.password_confirmation"
            />

            <div class="mb-3 d-flex flex-column">
                <label for="gender-btns" class="m-2">Gender</label>
                <div class="gender-btns-wrap">
                    <div class="gender-btns">
                        <input
                            type="radio"
                            class="btn-check"
                            v-model="form.gender"
                            id="gender_male"
                            value="Male"
                            autocomplete="off"
                            checked
                        />
                        <label
                            class="btn btn-outline-secondary"
                            for="gender_male"
                            >Male</label
                        >
                    </div>
                    <div class="gender-btns">
                        <input
                            type="radio"
                            class="btn-check"
                            v-model="form.gender"
                            id="gender_female"
                            value="Female"
                            autocomplete="off"
                        />
                        <label
                            class="btn btn-outline-secondary"
                            for="gender_female"
                            >Female</label
                        >
                    </div>
                </div>

                <span v-if="form.errors.gender" class="text-danger">
                    {{ form.errors.gender }}
                </span>
            </div>

            <button
                type="submit"
                class="btn btn-primary w-100 mt-2"
                :disabled="form.processing"
                name="sign_up"
            >
                Sign up
                <div
                    class="spinner-border spinner-border-sm"
                    role="status"
                    v-if="form.processing"
                >
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </form>
    </div>
</template>
<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import BaseInput from "@/components/Base/BaseInput.vue";

let form = useForm({
    register_name: "",
    register_email: "",
    register_password: "",
    password_confirmation: "",
    gender: "Male",
});

const register = () => {
    form.post(route("register"));
};
</script>
