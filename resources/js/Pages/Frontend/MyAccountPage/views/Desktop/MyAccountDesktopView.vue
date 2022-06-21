<template>
    <section class="container mb-5 mt-5">
        <MyAccountHeader />
        <div class=" nav nav-tabs d-flex flex-row justify-content-between bg-transparent"
            style="flex-wrap:unset !important" role="tablist">


            <button role="tab" class="account-desktop-tabs-btns active card  w-100 collapse-btn  me-1 "
                id="account-settings-tab" data-bs-toggle="tab" data-bs-target="#account-settings">
                <div class="card-body text-center p-4">
                    <span class="card-title d-flex flex-row  align-items-center ">
                        <i class="fas fa-cog me-2"></i> Account Settings
                    </span>
                </div>
            </button>

            <button role="tab" class="account-desktop-tabs-btns card  w-100 collapse-btn me-1" id="my-orders-tab"
                data-bs-toggle="tab" data-bs-target="#my-orders">
                <div class="card-body text-center p-4">
                    <span class="card-title d-flex flex-row  align-items-center ">
                        <i class="fas fa-boxes me-2"></i> My Orders
                    </span>
                </div>
            </button>


            <button role="tab" class="account-desktop-tabs-btns card  w-100 collapse-btn" id="address-book-tab"
                data-bs-toggle="tab" data-bs-target="#address-book">
                <div class="card-body text-center p-4">
                    <span class="card-title d-flex flex-row  align-items-center">

                        <i class="far fa-address-card me-2"></i> Address Book
                    </span>
                </div>
            </button>
        </div>

        <div class="tab-content bg-white shadow-sm mt-2 " id="myAccountTabsContent">
            <div class="tab-pane fade show active p-3" id="account-settings" role="tabpanel" aria-labelledby="home-tab">
                <MyAccountSettings />
            </div>
            <div class="tab-pane fade p-3" id="my-orders" role="tabpanel" aria-labelledby="my-orders-tab">
                <MyOrders />
            </div>
            <div class="tab-pane fade p-3" id="address-book" role="tabpanel" aria-labelledby="address-book-tab">
                <MyAddressBook />
            </div>
        </div>


    </section>
</template>

<script setup>
import MyAccountSettings from '@/Pages/Frontend/MyAccountPage/Shared/MyAccountSettings/index.vue';
import MyAddressBook from '@/Pages/Frontend/MyAccountPage/Shared/MyAddressBook/index.vue';
import MyOrders from '@/Pages/Frontend/MyAccountPage/Shared/MyOrders/index.vue';
import MyAccountHeader from '@/Pages/Frontend/MyAccountPage/views/Desktop/components/MyAccountHeader.vue';


const openAccountSettings = () =>
{
    $('.collapse').each(function ()
    {
        $(this).collapse("hide");

    });
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