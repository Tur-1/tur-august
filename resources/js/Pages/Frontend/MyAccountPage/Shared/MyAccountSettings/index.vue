<script setup>
import AccountInfo from '@/Pages/Frontend/MyAccountPage/Shared/MyAccountSettings/AccountInfo.vue';
import AccountPassword from '@/Pages/Frontend/MyAccountPage/Shared/MyAccountSettings/AccountPassword.vue';
import AccountPhoneNumber from '@/Pages/Frontend/MyAccountPage/Shared/MyAccountSettings/AccountPhoneNumber.vue';

</script>
<template>
    <div class="row g-5">
        <div class="col-md-7">
            <AccountInfo />
        </div>
        <div class="col-md-5">
            <AccountPassword />
            <AccountPhoneNumber />
        </div>
    </div>

</template>