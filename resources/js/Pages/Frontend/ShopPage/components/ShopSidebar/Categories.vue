<template >
    <ul class="shop-sidebar-categories">
        <li class="shop-sidebar-category-item" v-for="(cat, index) in $page.props.category.children" :key="index">
            <Link :href="route('shopPage', { category_slug: cat.slug })">
            <i class="bi bi-caret-right-fill"></i>
            {{ cat.name }}
            </Link>
        </li>
    </ul>
</template>
 