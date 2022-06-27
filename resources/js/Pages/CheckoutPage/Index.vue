<template>
    <AppLayout title="checkout" backgroundColor="background-color:#F9F9F9">
        <Breadcrumb pageTitle="checkout" v-if="isDesktop" />
        <section class="container">
            <CheckoutHeader v-if="isDesktop" />
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
import AppLayout from "@/layouts/AppLayout";
import Breadcrumb from "@/components/Breadcrumb";
import CheckoutHeader from "@/Pages/CheckoutPage/components/CheckoutHeader";
import CheckoutUserAddresses from "@/Pages/CheckoutPage/components/CheckoutUserAddresses";
import CheckoutCouponForm from "@/Pages/CheckoutPage/components/CheckoutCouponForm";
import CheckoutProducts from "@/Pages/CheckoutPage/components/CheckoutProducts";
import CheckoutDetails from "@/Pages/CheckoutPage/components/CheckoutDetails";

import { ref } from "vue";

let isDesktop = ref(true);

const mediaQueryWidth = window.matchMedia("(max-width: 756px)");

if (mediaQueryWidth.matches) {
    isDesktop.value = false;
}
</script>
