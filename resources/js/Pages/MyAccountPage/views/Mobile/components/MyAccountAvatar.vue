<template>
    <div class="account-image-wrap">
        <div class="account-image">
            <img :src="$page.props.user.avatar" class="rounded-circle" />
        </div>
        <div class="account-user-name">
            <span>Hi,</span>
            <span>{{ $page.props.user.name }}</span>
        </div>
    </div>
</template>
