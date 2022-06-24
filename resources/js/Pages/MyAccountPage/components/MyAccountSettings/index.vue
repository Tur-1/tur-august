<script setup>
import AccountInformation from "@/Pages/MyAccountPage/components/MyAccountSettings/AccountInformation/index.vue";
import AccountPassword from "@/Pages/MyAccountPage/components/MyAccountSettings/AccountPassword/index.vue";
import AccountPhoneNumber from "@/Pages/MyAccountPage/components/MyAccountSettings/AccountPhoneNumber/index.vue";
</script>
<template>
    <div class="row g-5">
        <div class="col-md-7">
            <AccountInformation :userInfo="$page.props.user" />
        </div>
        <div class="col-md-5">
            <AccountPassword />
            <AccountPhoneNumber
                :userPhoneNumber="$page.props.user.phone_number"
            />
        </div>
    </div>
</template>
