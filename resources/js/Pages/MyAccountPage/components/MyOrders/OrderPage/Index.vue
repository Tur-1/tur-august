<template>
    <app-layout
        title="Order Details"
        :backUrl="$page.props.previousPageUrl"
        backgroundColor="app-bg-secondary"
    >
        <section>
            <div class="container mt-3">
                <div class="col-lg-6 m-auto">
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
</script>
