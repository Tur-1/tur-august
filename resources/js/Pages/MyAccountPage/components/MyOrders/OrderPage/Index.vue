<template>
    <app-layout title="My Account" backgroundColor="background-color:#F9F9F9">
        <section class="container mb-5 mt-3">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9">
                    <OrderDetails />
                    <OrderAddress />
                    <OrderProducts :products="$page.props.order.products" />
                </div>
            </div>
        </section>
    </app-layout>
</template>
<script setup>
import AppLayout from "@/layouts/AppLayout";
import OrderDetails from "@/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderDetails.vue";
import OrderAddress from "@/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderAddress.vue";
import OrderProducts from "@/Pages/MyAccountPage/components/MyOrders/OrderPage/OrderProducts.vue";
</script>
