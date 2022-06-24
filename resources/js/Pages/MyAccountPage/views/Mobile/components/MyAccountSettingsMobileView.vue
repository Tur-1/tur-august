<template>
    <li>
        <button
            data-bs-toggle="offcanvas"
            data-bs-target="#account-settings-offcanvas"
            role="button"
            class="text-dark"
        >
            <i class="far fa-address-card pb-2 me-2"></i>

            <div
                class="d-flex align-items-center justify-content-between w-100 border-bottom pb-2"
            >
                <span class="account-item-title">Account Settings</span>
                <i class="bi bi-chevron-right"></i>
            </div>
        </button>
    </li>

    <div
        class="offcanvas offcanvas-end"
        tabindex="-1"
        id="account-settings-offcanvas"
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

            <h5 class="offcanvas-title" id="staticBackdropLabel">
                Account Settings
            </h5>
            <div></div>
        </div>
        <div class="offcanvas-body bg-light">
            <MyAccountSettings />
        </div>
    </div>
</template>
<script setup>
import MyAccountSettings from "@/Pages/MyAccountPage/components/MyAccountSettings/index.vue";
</script>
