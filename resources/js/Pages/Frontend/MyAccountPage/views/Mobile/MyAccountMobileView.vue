<template>
    <section class="mb-5">


        <MyAccountAvatar />

        <ul class="account-items">
            <MyOrdersMobileUI />

            <MyAccountSettingsMobileUI />

            <MyAddressBookMobileUI />

            <Logout />
        </ul>

    </section>
</template>

<script setup>
import MyAccountAvatar from '@/Pages/Frontend/MyAccountPage/views/Mobile/components/MyAccountAvatar.vue';
import MyOrdersMobileUI from '@/Pages/Frontend/MyAccountPage/views/Mobile/components/MyOrdersMobileUI.vue';
import MyAccountSettingsMobileUI from '@/Pages/Frontend/MyAccountPage/views/Mobile/components/MyAccountSettingsMobileUI.vue';
import MyAddressBookMobileUI from '@/Pages/Frontend/MyAccountPage/views/Mobile/components/MyAddressBookMobileUI.vue';
import Logout from '@/Pages/Frontend/MyAccountPage/views/Mobile/components/Logout.vue';

</script>