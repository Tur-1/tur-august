<template>
    <section class="container mb-5 mt-5">
        <MyAccountHeader />
        <div
            class="nav nav-tabs d-flex flex-row justify-content-between bg-transparent"
            style="flex-wrap: unset !important"
            role="tablist"
        >
            <button
                role="tab"
                class="account-desktop-tabs-btns active card w-100 collapse-btn me-1"
                id="account-settings-tab"
                data-bs-toggle="tab"
                data-bs-target="#account-settings"
            >
                <span class="d-flex flex-row align-items-center">
                    <div class="icon-circle">
                        <i class="bi bi-gear"></i>
                    </div>
                    Account Settings
                </span>
            </button>

            <button
                role="tab"
                class="account-desktop-tabs-btns card w-100 collapse-btn me-1"
                id="my-orders-tab"
                data-bs-toggle="tab"
                data-bs-target="#my-orders"
            >
                <span class="d-flex flex-row align-items-center">
                    <div class="icon-circle">
                        <i class="bi bi-boxes"></i>
                    </div>
                    My Orders
                </span>
            </button>

            <button
                role="tab"
                class="account-desktop-tabs-btns card w-100 collapse-btn"
                id="address-book-tab"
                data-bs-toggle="tab"
                data-bs-target="#address-book"
            >
                <span class="d-flex flex-row align-items-center">
                    <div class="icon-circle">
                        <i class="bi bi-card-list"></i>
                    </div>
                    Address Book
                </span>
            </button>
        </div>

        <div
            class="tab-content bg-white shadow-sm mt-2"
            id="myAccountTabsContent"
        >
            <div
                class="tab-pane fade show active p-3"
                id="account-settings"
                role="tabpanel"
                aria-labelledby="home-tab"
            >
                <MyAccountSettings />
            </div>
            <div
                class="tab-pane fade"
                id="my-orders"
                role="tabpanel"
                aria-labelledby="my-orders-tab"
            >
                <MyOrders />
            </div>
            <div
                class="tab-pane fade p-3"
                id="address-book"
                role="tabpanel"
                aria-labelledby="address-book-tab"
            >
                <MyAddressBook />
            </div>
        </div>
    </section>
</template>

<script setup>
import MyAccountSettings from "@/Pages/MyAccountPage/components/MyAccountSettings/index.vue";
import MyAddressBook from "@/Pages/MyAccountPage/components/MyAddressBook/index.vue";
import MyOrders from "@/Pages/MyAccountPage/components/MyOrders/index.vue";
import MyAccountHeader from "@/Pages/MyAccountPage/views/Desktop/components/MyAccountHeader.vue";

const openAccountSettings = () => {
    $(".collapse").each(function () {
        $(this).collapse("hide");
    });
    $("#account-settings").collapse("toggle");
};
const openMyOrders = () => {
    $(".collapse").each(function () {
        $(this).collapse("hide");
    });
    $("#my-orders").collapse("toggle");
};

const openAddressBook = () => {
    $(".collapse").each(function () {
        $(this).collapse("hide");
    });
    $("#address-book").collapse("toggle");
};
</script>
