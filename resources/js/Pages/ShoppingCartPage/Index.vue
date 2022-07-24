<template>
    <app-layout title="shopping cart">
        <section>
            <Breadcrumb pageTitle="shopping cart" v-if="isDesktop" />
            <div class="container mt-3">
                <CartHeader v-if="isDesktop" />
                <div
                    class="row d-flex justify-content-center"
                    :class="{ 'd-none': $page.props.cartCounter == 0 }"
                >
                    <CartProducts />
                    <CartDetails />
                </div>
                <CartEmpty :show="$page.props.cartCounter == 0" />
            </div>
            <ProductsNoLongerInStock />
        </section>
    </app-layout>
</template>

<script setup>
import AppLayout from "@/layouts/AppLayout";
import Breadcrumb from "@/components/Breadcrumb";
import CartHeader from "@/Pages/ShoppingCartPage/components/CartHeader";
import CartProducts from "@/Pages/ShoppingCartPage/components/CartProducts";
import CartDetails from "@/Pages/ShoppingCartPage/components/CartDetails";
import ProductsNoLongerInStock from "@/Pages/ShoppingCartPage/components/ProductsNoLongerInStock.vue";

import { ref } from "vue";
import CartEmpty from "@/Pages/ShoppingCartPage/components/CartEmpty.vue";

let isDesktop = ref(true);
let isMobile = ref(false);

const mediaQueryWidth = window.matchMedia("(max-width: 756px)");

if (mediaQueryWidth.matches) {
    isMobile.value = true;
    isDesktop.value = false;
}
document.querySelector("body").style.backgroundColor = "#F9F9F9";
</script>
