<template>
    <app-layout title="shopping cart" backgroundColor="background-color:#F9F9F9">
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
import AppLayout from "@/layouts/Frontend/AppLayout";
import Breadcrumb from "@/shared/Breadcrumb";
import CartHeader from "@/Pages/Frontend/ShoppingCartPage/components/CartHeader";
import CartProducts from "@/Pages/Frontend/ShoppingCartPage/components/CartProducts";
import CartDetails from "@/Pages/Frontend/ShoppingCartPage/components/CartDetails";


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
