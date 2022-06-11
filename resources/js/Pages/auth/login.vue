<template>
    <AppLayout title="Login">
        <Breadcrumb pageTitle="Login" />
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
import Breadcrumb from "@/shared/Breadcrumb";
import AuthTabsHeader from "@/Pages/auth/components/AuthTabsHeader";
import SocialButtons from "@/Pages/auth/components/SocialButtons";
import LoginForm from "@/Pages/auth/components/LoginForm";
import RegisterForm from "@/Pages/auth/components/RegisterForm";
</script>
