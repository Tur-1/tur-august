<template>
    <app-layout
        title="Order Details"
        backgroundColor="background-color:#F9F9F9"
        :backUrl="$page.props.previousPageUrl"
    >
        <section class="container-fluid">
            <div class="d-flex flex-column justify-content-center">
                <OrderDetails />
                <OrderAddress />
                <OrderProducts />
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
