<template>
    <div class="auth-container">
        <AuthTabsHeader />

        <div class="tab-content" id="myTabContent">
            <SocialButtons />
            <LoginForm />
            <RegisterForm />
            <ResetPasswrod />
        </div>
    </div>
</template>

<script setup>
import AuthTabsHeader from "@/Pages/Auth/components/AuthTabsHeader";
import SocialButtons from "@/Pages/Auth/components/SocialButtons";
import LoginForm from "@/Pages/Auth/components/LoginForm";
import RegisterForm from "@/Pages/Auth/components/RegisterForm";
import { ref } from "vue";
import ResetPasswrod from "@/Pages/Auth/components/ResetPasswrod.vue";

let isDesktop = ref(true);

const mediaQueryWidth = window.matchMedia("(max-width: 756px)");

if (mediaQueryWidth.matches) {
    isDesktop.value = false;
}
</script>
