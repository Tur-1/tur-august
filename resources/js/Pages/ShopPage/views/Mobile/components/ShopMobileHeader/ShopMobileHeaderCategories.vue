<template >
    <div class="mobile-header-categories-warp">
        <div class="mobile-categories-row mb-1">
            <div class="swiper-slide">
                <Link class="category-link active-category-link"
                    :href="route('shopPage', { category_slug: $page.props.category.slug })">
                {{ $page.props.category.name }}
                </Link>
            </div>
            <div class="swiper-slide" v-for="(cat, index) in $page.props.category.children" :key="cat.id">
                <Link class="category-link" :href="route('shopPage', { category_slug: cat.slug })">
                {{ cat.name }}
                </Link>
            </div>
        </div>


    </div>
</template>
<script setup>

</script>
