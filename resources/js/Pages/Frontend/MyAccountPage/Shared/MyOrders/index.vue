<template>
    <div class="row">
        <a
            class="col-md-4 col-12 mb-2 pb-1 mt-2"
            role="button"
            @click="openOrderOffcanvas(1)"
        >
            <div class="card shadow-sm p-2">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="text-dark">order no #1</h5>
                    <span class="text-dark">order details</span>
                </div>
            </div>
            <div
                class="rounded text-center pt-2 pe-3 ps-3 d-flex justify-content-between bg-light text-primary"
            >
                <p>February 18 ,2022</p>
                <p>269.10 SAR</p>
            </div>
        </a>
    </div>

    <OrderPage :orderId="orderId" />
</template>
<script setup>
import OrderPage from "@/Pages/Frontend/MyAccountPage/components /MyOrders/OrderPage.vue";
import { ref } from "vue";

let orderId = ref(0);

const openOrderOffcanvas = (order_id) => {
    orderId.value = "order-id-" + order_id;
    $("#order-id-" + order_id).offcanvas("show");
};
</script>
