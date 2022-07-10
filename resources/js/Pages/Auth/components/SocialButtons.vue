<template>
    <ul class="social-buttons">
        <li>
            <a class="btn btn-dark" :href="route('social.github')">
                <i class="fab fa-github me-1"></i>
                Sign in With Github
            </a>
        </li>
        <li>
            <a class="btn btn-danger" :href="route('social.google')">
                <i class="fab fa-google me-1"></i>
                Sign in With Google
            </a>
        </li>
    </ul>
</template>
