<template>
    <app-layout title="checkout" :backUrl="$page.props.cartPageUrl">
        <section>
            <div class="container mt-3">
                <Breadcrumb pageTitle="checkout" v-if="isDesktop" />
                <CheckoutHeader v-if="isDesktop" />
                <div
                    class="row"
                    :class="{ 'd-none': $page.props.cartCounter == 0 }"
                >
                    <div class="col-xl-8 col-lg-7 col-md-6">
                        <CheckoutUserAddresses :checkoutForm="checkoutForm" />
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6 mb-5">
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

                <CartEmpty :show="$page.props.cartCounter == 0" />
                <!-- Modal -->
                <ProductsNoLongerInStock />
            </div>
        </section>
    </app-layout>
</template>

<script setup>
import { onMounted, ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

import AppLayout from "@/layouts/AppLayout";
import Breadcrumb from "@/components/Breadcrumb";
import CheckoutHeader from "@/Pages/CheckoutPage/components/CheckoutHeader";
import CheckoutCouponForm from "@/Pages/CheckoutPage/components/CheckoutCouponForm";
import CheckoutProducts from "@/Pages/CheckoutPage/components/CheckoutProducts";
import CheckoutDetails from "@/Pages/CheckoutPage/components/CheckoutDetails";
import ProductsNoLongerInStock from "@/Pages/ShoppingCartPage/components/ProductsNoLongerInStock.vue";
import CartEmpty from "@/Pages/ShoppingCartPage/components/CartEmpty.vue";
import CheckoutUserAddresses from "@/Pages/CheckoutPage/components/CheckoutUserAddresses/Index.vue";

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
onMounted(() => {
    document.querySelector("body").style.backgroundColor = "#F9F9F9";
});
</script>
