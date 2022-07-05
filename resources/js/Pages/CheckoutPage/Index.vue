<template>
    <AppLayout title="checkout" backgroundColor="background-color:#F9F9F9">
        <Breadcrumb pageTitle="checkout" v-if="isDesktop" />
        <section class="container">
            <CheckoutHeader v-if="isDesktop" />
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-6">
                    <CheckoutUserAddresses :checkoutForm="checkoutForm" />
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6">
                    <CheckoutProducts />
                    <CheckoutCouponForm />
                    <CheckoutDetails />

                    <button
                        class="btn btn-primary p-2 mt-3 w-100"
                        @click="buyNow"
                    >
                        Buy Now
                    </button>
                </div>
            </div>
            <!-- Modal -->
            <ProductsNoLongerInStock />
        </section>
    </AppLayout>
</template>

<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

import AppLayout from "@/layouts/AppLayout";
import Breadcrumb from "@/components/Breadcrumb";
import CheckoutHeader from "@/Pages/CheckoutPage/components/CheckoutHeader";
import CheckoutUserAddresses from "@/Pages/CheckoutPage/components/CheckoutUserAddresses";
import CheckoutCouponForm from "@/Pages/CheckoutPage/components/CheckoutCouponForm";
import CheckoutProducts from "@/Pages/CheckoutPage/components/CheckoutProducts";
import CheckoutDetails from "@/Pages/CheckoutPage/components/CheckoutDetails";
import ProductsNoLongerInStock from "@/Pages/ShoppingCartPage/components/ProductsNoLongerInStock.vue";

let checkoutForm = useForm({
    address_id: "",
});

const buyNow = () => {
    checkoutForm.post(route("buyNow"));
};
let isDesktop = ref(true);

const mediaQueryWidth = window.matchMedia("(max-width: 756px)");

if (mediaQueryWidth.matches) {
    isDesktop.value = false;
}
</script>
