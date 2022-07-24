<template>
    <app-layout title="Order Details" :backUrl="$page.props.previousPageUrl">
        <section class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <OrderDetails />
                    <OrderAddress />
                    <OrderProducts />
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

document.querySelector("body").style.backgroundColor = "#F9F9F9";
</script>
