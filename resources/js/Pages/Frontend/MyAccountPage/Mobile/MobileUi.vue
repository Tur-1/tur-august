<template>
    <section class="mb-5">


        <div class="account-image-wrap">
            <div class="account-image">
                <img src="http://august.com/frontend/assets/imgs/avatars/avatar_female.png" class="rounded-circle ">

            </div>
            <div class="account-user-name">
                <span>Hi,</span>
                <span>Admin</span>
            </div>
        </div>
        <ul class="account-items">
            <li>
                <button data-bs-toggle="offcanvas" data-bs-target="#my-orders-offcanvas" role="button"
                    class=" text-dark">

                    <i class="bi bi-box-seam pb-2 me-2"></i>

                    <div class="d-flex justify-content-between align-items-center w-100 border-bottom pb-2">
                        <span class="account-item-title">My orders</span>
                        <i class="bi bi-chevron-right "></i>
                    </div>
                </button>
            </li>
            <li>
                <button data-bs-toggle="offcanvas" data-bs-target="#account-settings-offcanvas" role="button"
                    class="text-dark">

                    <i class="far fa-address-card  pb-2 me-2"></i>

                    <div class="d-flex align-items-center justify-content-between w-100 border-bottom  pb-2">
                        <span class="account-item-title">Account Settings</span>
                        <i class="bi bi-chevron-right "></i>
                    </div>
                </button>
            </li>
            <li>
                <button data-bs-toggle="offcanvas" data-bs-target="#address-book-offcanvas" role="button"
                    class="text-dark">

                    <i class="bi bi-geo-alt  pb-2 me-2"></i>


                    <div class="d-flex  align-items-center justify-content-between w-100 border-bottom  pb-2">
                        <span class="account-item-title">Address Book</span>
                        <i class="bi bi-chevron-right "></i>
                    </div>
                </button>
            </li>
            <li>
                <button data-bs-target="http://august.com/logout"
                    onclick="event.preventDefault();  document.getElementById('logout-form').submit();"
                    class="  text-dark">

                    <i class="bi bi-box-arrow-left pb-2 me-2"></i>
                    <div class="d-flex align-items-center  justify-content-between w-100 border-bottom  pb-2">
                        <span class="account-item-title">Log out</span>
                        <i class="bi bi-chevron-right "></i>
                    </div>
                </button>
            </li>
        </ul>

        <div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="account-settings-offcanvas"
            aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header ">
                <button type="button" class="close-offcanvas-btn" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bi bi-chevron-left "></i>
                </button>

                <h5 class="offcanvas-title" id="staticBackdropLabel">Account Settings</h5>
                <div></div>
            </div>
            <div class="offcanvas-body bg-light">
                <MyAccountSettings />
            </div>
        </div>
        <div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="my-orders-offcanvas"
            aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header ">
                <button type="button" class="close-offcanvas-btn" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bi bi-chevron-left "></i>
                </button>

                <h5 class="offcanvas-title" id="staticBackdropLabel">My orders</h5>
                <div></div>
            </div>
            <div class="offcanvas-body bg-light">
                <MyOrders />
            </div>
        </div>

        <div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="address-book-offcanvas"
            aria-labelledby="staticBackdropLabel">
            <div class="offcanvas-header ">
                <button type="button" class="close-offcanvas-btn" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bi bi-chevron-left "></i>
                </button>

                <h5 class="offcanvas-title" id="staticBackdropLabel">Address Book</h5>
                <div></div>
            </div>
            <div class="offcanvas-body bg-light">
                <MyAddressBook />
            </div>
        </div>


    </section>
</template>

<script setup>
import MyAccountHeader from '@/Pages/Frontend/MyAccountPage/components/MyAccountHeader';
import MyAccountSettings from "@/Pages/Frontend/MyAccountPage/components/MyAccountSettings";
import MyOrders from "@/Pages/Frontend/MyAccountPage/components/MyOrders";
import MyAddressBook from "@/Pages/Frontend/MyAccountPage/components/MyAddressBook";
</script>