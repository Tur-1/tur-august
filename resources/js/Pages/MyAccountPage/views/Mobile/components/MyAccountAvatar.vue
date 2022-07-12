<template>
    <div class="account-image-wrap">
        <div class="account-image">
            <img :src="user.avatar" class="rounded-circle" />
        </div>
        <div class="account-user-name">
            <span>Hi,</span>
            <span>{{ user.name }}</span>
        </div>
    </div>
</template>
