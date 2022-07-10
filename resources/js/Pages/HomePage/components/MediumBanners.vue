<template>
    <div class="row mt-4 mb-5">
        <div v-for="(banner, index) in $page.props.mediumBanners" class="mb-3">
            <Link :href="banner.link">
                <img :src="banner.image_url" class="w-100" alt="..." />
            </Link>
        </div>
    </div>
</template>
