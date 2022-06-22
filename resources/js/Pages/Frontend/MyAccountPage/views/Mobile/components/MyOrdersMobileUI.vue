<template>
    <li>
        <button
            data-bs-toggle="offcanvas"
            data-bs-target="#my-orders-offcanvas"
            role="button"
            class="text-dark"
        >
            <i class="bi bi-box-seam pb-2 me-2"></i>

            <div
                class="d-flex justify-content-between align-items-center w-100 border-bottom pb-2"
            >
                <span class="account-item-title">My orders</span>
                <i class="bi bi-chevron-right"></i>
            </div>
        </button>
    </li>

    <div
        class="offcanvas offcanvas-end"
        tabindex="-1"
        id="my-orders-offcanvas"
        aria-labelledby="staticBackdropLabel"
    >
        <div class="offcanvas-header">
            <button
                type="button"
                class="close-offcanvas-btn"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
            >
                <i class="bi bi-chevron-left"></i>
            </button>

            <h5 class="offcanvas-title" id="staticBackdropLabel">My orders</h5>
            <div></div>
        </div>
        <div class="offcanvas-body bg-light">
            <MyOrders />
        </div>
    </div>
</template>
<script setup>
import MyOrders from "@/Pages/Frontend/MyAccountPage/components/MyOrders/index.vue";
</script>
