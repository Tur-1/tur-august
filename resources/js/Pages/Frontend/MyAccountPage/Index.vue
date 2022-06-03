<template>

    <app-layout title="shopping cart" backgroundColor="background-color:#F9F9F9">
        <section class="container mb-5 mt-5">
            <MyAccountHeader />
            <div class=" nav nav-tabs d-flex flex-row justify-content-between" style="flex-wrap:unset !important"
                role="tablist">


                <button role="tab" class="card shadow-sm w-100 collapse-btn  me-1 active" id="account-settings-tab"
                    data-bs-toggle="tab" data-bs-target="#account-settings">
                    <div class="card-body text-center p-4">
                        <span class="card-title d-flex flex-row  align-items-center text-dark">
                            <i class="fas fa-cog me-2"></i> Account Settings
                        </span>
                    </div>
                </button>

                <button role="tab" class="card shadow-sm w-100 collapse-btn me-1" id="my-orders-tab"
                    data-bs-toggle="tab" data-bs-target="#my-orders">
                    <div class="card-body text-center p-4">
                        <span class="card-title d-flex flex-row  align-items-center text-dark">
                            <i class="fas fa-boxes me-2"></i> My Orders
                        </span>
                    </div>
                </button>


                <button role="tab" class="card shadow-sm w-100 collapse-btn" id="address-book-tab" data-bs-toggle="tab"
                    data-bs-target="#address-book">
                    <div class="card-body text-center p-4">
                        <span class="card-title d-flex flex-row  align-items-center text-dark">

                            <i class="far fa-address-card me-2"></i> Address Book
                        </span>
                    </div>
                </button>

            </div>

            <div class="tab-content bg-white shadow-sm mt-2 " id="myTabContent">

                <MyAccountSettings />
                <MyOrders />
                <MyAddressBook />
            </div>


        </section>
    </app-layout>
</template>
<script setup>
import AppLayout from "@/layouts/Frontend/AppLayout";
import MyAccountHeader from '@/Pages/Frontend/MyAccountPage/components/MyAccountHeader';
import MyAccountSettings from "@/Pages/Frontend/MyAccountPage/components/MyAccountSettings";
import MyOrders from "@/Pages/Frontend/MyAccountPage/components/MyOrders";
import MyAddressBook from "@/Pages/Frontend/MyAccountPage/components/MyAddressBook";


const openAccountSettings = () =>
{
    // $('.collapse').each(function ()
    // {
    //     $(this).collapse("hide");

    // });
    $("#account-settings").collapse("toggle");
}
const openMyOrders = () =>
{
    $('.collapse').each(function ()
    {
        $(this).collapse("hide");

    });
    $("#my-orders").collapse("toggle");
}

const openAddressBook = () =>
{
    $('.collapse').each(function ()
    {
        $(this).collapse("hide");

    });
    $("#address-book").collapse("toggle");
}

</script>