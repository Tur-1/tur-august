<template>
    <li>
        <button data-bs-toggle="offcanvas" data-bs-target="#address-book-offcanvas" role="button" class="text-dark">

            <i class="bi bi-geo-alt  pb-2 me-2"></i>


            <div class="d-flex  align-items-center justify-content-between w-100 border-bottom  pb-2">
                <span class="account-item-title">Address Book</span>
                <i class="bi bi-chevron-right "></i>
            </div>
        </button>
    </li>


    <div class="offcanvas offcanvas-end" tabindex="-1" id="address-book-offcanvas"
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
</template>
<script setup>
import MyAddressBook from '@/Pages/Frontend/MyAccountPage/Shared/MyAddressBook/index.vue';
</script>