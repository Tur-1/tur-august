

<template>
    <div class="auth-form-content tab-pane fade" id="register-form" role="tabpanel" aria-labelledby="register-form-tab">
        <form @submit.prevent="register">
            <!-- @csrf -->
            <div class="mb-3">
                <div class="form-floating ">
                    <input class="form-control form-control-sm" :class="form.errors.register_name ? 'is-invalid' : ''"
                        v-model="form.register_name" type="text" id="register_name" placeholder="name"
                        autocomplete="name">
                    <label for="register_name">name </label>
                </div>
                <span v-if="form.errors.register_name" class="text-danger">
                    {{ form.errors.register_name }}
                </span>
            </div>
            <div class="mb-3">
                <div class="form-floating ">
                    <input class="form-control form-control-sm " v-model="form.register_email" type="email"
                        :class="form.errors.register_email ? 'is-invalid' : ''" id="register_email" placeholder="email"
                        autocomplete="email">
                    <label for="register_email">Email </label>
                </div>
                <span v-if="form.errors.register_email" class="text-danger">
                    {{ form.errors.register_email }}
                </span>
            </div>
            <div class="mb-3">
                <div class="form-floating">
                    <input type="password" class="form-control"
                        :class="form.errors.register_password ? 'is-invalid' : ''" id="register_password"
                        v-model="form.register_password" placeholder="Password">
                    <label for="register_password">Password</label>
                </div>


                <span v-if="form.errors.register_password" class="text-danger">
                    {{ form.errors.register_password }}
                </span>

            </div>
            <div class="mb-3">
                <div class="form-floating">
                    <input type="password" class="form-control " v-model="form.password_confirmation"
                        id="password_confirmation" placeholder="confirm password">
                    <label for="password_confirmation">confirm password</label>
                </div>

            </div>
            <div class="mb-3 d-flex flex-column">
                <label for="gender-btns" class="m-2">Gender</label>
                <div class="gender-btns-wrap">
                    <div class="gender-btns">
                        <input type="radio" class="btn-check" v-model="form.gender" id="gender_male" value="Male"
                            autocomplete="off" checked>
                        <label class="  btn btn-outline-secondary" for="gender_male">Male</label>
                    </div>
                    <div class="gender-btns">
                        <input type="radio" class="btn-check" v-model="form.gender" id="gender_female" value="Female"
                            autocomplete="off">
                        <label class="btn btn-outline-secondary " for="gender_female">Female</label>
                    </div>
                </div>


                <span v-if="form.errors.gender" class="text-danger">
                    {{ form.errors.gender }}
                </span>
            </div>

            <button type="submit" class="btn btn-primary w-100" :disabled="form.processing" name="sign_up">
                Sign up
                <div class="spinner-border spinner-border-sm" role="status" v-if="form.processing">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </form>
    </div>
</template>
<script setup>
import { useForm } from "@inertiajs/inertia-vue3";



let form = useForm({
    register_name: '',
    register_email: '',
    register_password: '',
    password_confirmation: '',
    gender: 'Male',
});

const register = () =>
{
    form.post(route('register'));
}
</script>