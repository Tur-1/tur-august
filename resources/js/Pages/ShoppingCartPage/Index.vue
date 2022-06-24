<template>
    <app-layout
        title="shopping cart"
        backgroundColor="background-color:#F9F9F9"
    >
        <Breadcrumb pageTitle="shopping cart" v-if="showDesktopLayout" />
        <section class="container">
            <CartHeader v-if="showDesktopLayout" />
            <div class="row d-flex justify-content-center">
                <CartProducts />
                <CartDetails />
            </div>
        </section>
    </app-layout>
</template>

<script setup>
import AppLayout from "@/layouts/AppLayout";
import Breadcrumb from "@/components/Breadcrumb";
import CartHeader from "@/Pages/ShoppingCartPage/components/CartHeader";
import CartProducts from "@/Pages/ShoppingCartPage/components/CartProducts";
import CartDetails from "@/Pages/ShoppingCartPage/components/CartDetails";

import { ref } from "vue";

let showDesktopLayout = ref(true);
let showMobileLayout = ref(false);

const mediaQueryWidth = window.matchMedia("(max-width: 756px)");

if (mediaQueryWidth.matches) {
    showMobileLayout.value = true;
    showDesktopLayout.value = false;
}
</script>
