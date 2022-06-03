<template>
    <app-layout title="shopping cart" backgroundColor="background-color:#F9F9F9">
        <Breadcrumb pageTitle="shopping cart" />
        <section class="container ">
            <CartHeader />
            <div class="row d-flex justify-content-center">

                <CartProducts />
                <CartDetails />
            </div>
        </section>
    </app-layout>
</template>

<script setup>
import AppLayout from "@/layouts/Frontend/AppLayout";
import Breadcrumb from "@/components/Breadcrumb";
import CartHeader from "@/Pages/Frontend/ShoppingCartPage/components/CartHeader";
import CartProducts from "@/Pages/Frontend/ShoppingCartPage/components/CartProducts";
import CartDetails from "@/Pages/Frontend/ShoppingCartPage/components/CartDetails";
</script>
 