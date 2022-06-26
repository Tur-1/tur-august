<template>
    <div class="d-flex justify-content-between mb-4">
        <div class="">
            <span>Dashboard</span>
        </div>
        <div class="">
            <span style="text-align: center">
                Welcome Back, {{ $page.props.user.name }}
            </span>
        </div>

        <div>
            <Link
                :href="route('logout')"
                method="post"
                class="text-dark bg-transparent"
            >
                <span>Logout</span>
            </Link>
        </div>
    </div>
    <div class="card shadow-sm mb-3">
        <div class="card-body text-center p-4">
            <h5 class="card-title">Profile</h5>
        </div>
    </div>
</template>
