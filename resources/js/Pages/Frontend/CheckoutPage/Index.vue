<template>
    <AppLayout title="checkout" backgroundColor="background-color:#F9F9F9">
        <Breadcrumb pageTitle="checkout" v-if="showDesktopLayout" />
        <section class="container mt-3">
            <CheckoutHeader v-if="showDesktopLayout" />
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-6">
                    <CheckoutUserAddresses />
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <CheckoutProducts />
                    <CheckoutCouponForm />
                    <CheckoutDetails />
                </div>
            </div>
        </section>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/layouts/Frontend/AppLayout";
import Breadcrumb from "@/shared/Breadcrumb";
import CheckoutHeader from "@/Pages/Frontend/CheckoutPage/components/CheckoutHeader";
import CheckoutUserAddresses from "@/Pages/Frontend/CheckoutPage/components/CheckoutUserAddresses";
import CheckoutCouponForm from "@/Pages/Frontend/CheckoutPage/components/CheckoutCouponForm";
import CheckoutProducts from "@/Pages/Frontend/CheckoutPage/components/CheckoutProducts";
import CheckoutDetails from "@/Pages/Frontend/CheckoutPage/components/CheckoutDetails";


import { ref } from "vue";

let showDesktopLayout = ref(true);
let showMobileLayout = ref(false);

const mediaQueryWidth = window.matchMedia("(max-width: 756px)");

if (mediaQueryWidth.matches)
{
    showMobileLayout.value = true;
    showDesktopLayout.value = false;
}
</script>
