<template>
    <Suspense>
        <template #default>
            <div class="row medium-banners">
                <div
                    v-for="(banner, index) in $page.props.mediumBanners"
                    class="mb-3"
                >
                    <Link :href="banner.link">
                        <img
                            :src="banner.image_url"
                            class="w-100"
                            alt="..."
                            loading="lazy"
                        />
                    </Link>
                </div>
            </div>
        </template>
        <template #fallback>
            <BannersSkeleton />
        </template>
    </Suspense>
</template>
<script setup>
import BannersSkeleton from "@/Pages/HomePage/components/BannersSkeleton.vue";
</script>
