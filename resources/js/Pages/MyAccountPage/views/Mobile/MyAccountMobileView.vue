<template>
    <section>
        <MyAccountAvatar />

        <ul class="account-items">
            <MyOrdersMobileView />

            <MyAccountSettingsMobileView />

            <MyAddressBookMobileView />

            <Logout />
        </ul>
    </section>
</template>

<script setup>
import MyAccountAvatar from "@/Pages/MyAccountPage/views/Mobile/components/MyAccountAvatar.vue";
import MyOrdersMobileView from "@/Pages/MyAccountPage/views/Mobile/components/MyOrdersMobileView.vue";
import MyAccountSettingsMobileView from "@/Pages/MyAccountPage/views/Mobile/components/MyAccountSettingsMobileView.vue";
import MyAddressBookMobileView from "@/Pages/MyAccountPage/views/Mobile/components/MyAddressBookMobileView.vue";
import Logout from "@/Pages/MyAccountPage/views/Mobile/components/Logout.vue";
</script>
