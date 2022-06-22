<template>
    <AppLayout title="Login">
        <Breadcrumb pageTitle="Login" v-if="isDesktop" />
        <section class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="auth-container">
                        <AuthTabsHeader />

                        <div class="tab-content" id="myTabContent">
                            <SocialButtons />
                            <LoginForm />
                            <RegisterForm />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/layouts/Frontend/AppLayout";
import Breadcrumb from "@/components/Breadcrumb";
import AuthTabsHeader from "@/Pages/Frontend/Auth/components/AuthTabsHeader";
import SocialButtons from "@/Pages/Frontend/Auth/components/SocialButtons";
import LoginForm from "@/Pages/Frontend/Auth/components/LoginForm";
import RegisterForm from "@/Pages/Frontend/Auth/components/RegisterForm";
import { ref } from "vue";

let isDesktop = ref(true);

const mediaQueryWidth = window.matchMedia("(max-width: 756px)");

if (mediaQueryWidth.matches) {
    isDesktop.value = false;
}
</script>
